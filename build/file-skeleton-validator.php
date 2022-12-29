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
    $filename = getFilename($file);
    $category = substr($filename, strlen($filename) - 9) === "_category";
    if ($category) {
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)description: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---(\r\n|\r|\n)___/";
    } else {
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)category: .+(\r\n|\r|\n)description: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---(\r\n|\r|\n)___/";
    }
    $head = preg_match($skeletonHeaderRegex, $contents);
    if ($head !== 1) {
        $errors[] = "Invalid header given ($file)";
        $subError = true;
        goto end;
    }
    $name = getId($contents);
    if (!$category) {
        $categ = getCategory($contents);
    }
    if (preg_replace("/[a-z\-]+/", "", $name) !== "") {
        $errors[] = "the id of the file does not have the right format ($file)";
        $subError = true;
        goto end;
    }
    $icon = getIcon($contents);
    // if link is http, verify that the content exists
    if (substr($icon, 0, 4) === "http") {
        $headers = get_headers($icon);
        if (strpos($headers[0], "200") === false) {
            $errors[] = "The icon link does not exist ($file)";
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
