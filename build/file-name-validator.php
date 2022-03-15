<?php

require __DIR__ . "/build-base.php";

if (count($argv) !== 2) {
    printError("Invalid argument given");
    exit(1);
}

$hasError = false;

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    printWarning("find: $file");
    $subError = false;
    if (substr($file, -3) !== ".md") {
        printStatement("skipped due to invalid extension");
        continue;
    }
    $contents = file_get_contents($file);
    if ($contents === false) {
        printError("error in the recovery of the file content");
        $subError = true;
        goto end;
    }
    printStatement("file content get");
    $name = getId($contents);
    $filename = getFilename($file);
    $isCategory = substr($filename, strlen($filename) - 9) === "_category";
    if ($filename !== $name) {
        if (!$isCategory) {
            printError("file name is not valid, current: $filename, wanted: $name");
            $subError = true;
            goto end;
        } else {
            if ($filename !== $name . "_category") {
                printError("file name is not valid, current: $filename, wanted: $name" . "_category");
                $subError = true;
                goto end;
            }
        }
    }
    $folders = getFolder($file);
    if (count($folders) - 2 < 0) {
        printError("invalid file tree");
        $subError = true;
        goto end;
    }
    if ($isCategory) {
        $catNam = substr($filename, 0, strlen($filename) - 9);
        if ($folders[count($folders) - 2] !== $catNam) {
            printError("$catName is not in the right folder");
            $subError = true;
            goto end;
        }
    } else {
        $categ = getCategory($contents);
        if ($folders[count($folders) - 2] !== $categ) {
            printError("$filename is not in the right folder");
            $subError = true;
            goto end;
        }
    }
    end:
    if (!$subError) {
        printSuccess(getFilename($file) . " valid");
    } else {
        $hasError = true;
    }
}

if ($hasError) {
    exit(1);
}
