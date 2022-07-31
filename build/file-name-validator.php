<?php

require __DIR__ . "/build-base.php";

if (count($argv) !== 2) {
    printError("Invalid argument given");
    exit(1);
}

$hasError = false;
$errors = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    $subError = false;
    if (substr($file, -3) !== ".md") {
        continue;
    }
    $contents = file_get_contents($file);
    if ($contents === false) {
        $errors[] = "Error in the recovery of the file content ($file)";
        $subError = true;
        goto end;
    }
    $name = getId($contents);
    $filename = getFilename($file);
    $isCategory = substr($filename, strlen($filename) - 9) === "_category";
    if ($filename !== $name) {
        if (!$isCategory) {
            $errors[] = "File name is not valid, current: $filename, wanted: $name ($file)";
            $subError = true;
            goto end;
        } else {
            if ($filename !== $name . "_category") {
                $errors[] = "File name is not valid, current: $filename, wanted: $name" . "_category ($file)";
                $subError = true;
                goto end;
            }
        }
    }
    $folders = getFolder($file);
    if (count($folders) - 2 < 0) {
        $errors[] = "Invalid file tree ($file)";
        $subError = true;
        goto end;
    }
    if ($isCategory) {
        $catNam = substr($filename, 0, strlen($filename) - 9);
        if ($folders[count($folders) - 2] !== $catNam) {
            $errors[] = "$catName is not in the right folder ($file)";
            $subError = true;
            goto end;
        }
    } else {
        $categ = getCategory($contents);
        if ($folders[count($folders) - 2] !== $categ) {
            $errors[] = "$filename is not in the right folder ($file)";
            $subError = true;
            goto end;
        }
    }
    end:
    if ($subError) {
        $hasError = true;
    }
}

printErrors($errors);

if ($hasError) {
    exit(1);
}
