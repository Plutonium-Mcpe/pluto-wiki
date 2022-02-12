<?php

require __DIR__ . "/build-base.php";

if (count($argv) !== 2) {
    printError("Invalid argument given");
    exit(1);
}

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    printWarning("find: $file");
    if (substr($file, -3) !== ".md") {
        printStatement("skipped due to invalid extension");
        continue;
    }
    $contents = file_get_contents($file);
    if ($contents === false) {
        printError("error in the recovery of the file content");
        exit(1);
    }
    printStatement("file content get");
    $name = getId($contents);
    $filename = getFilename($file);
    $isCategory = substr($filename, strlen($filename) - 9) === "_category";
    if ($filename !== $name) {
        if (!$isCategory) {
            printError("file name is not valid, current: $filename, wanted: $name");
            exit(1);
        } else {
            if ($filename !== $name . "_category") {
                printError("file name is not valid, current: $filename, wanted: $name" . "_category");
                exit(1);
            }
        }
    }
    $folders = getFolder($file);
    if (count($folders) - 2 < 0) {
        printError("invalid file tree");
        exit(1);
    }
    if ($isCategory) {
        $catNam = substr($filename, 0, strlen($filename) - 9);
        if ($folders[count($folders) - 2] !== $catNam) {
            printError("$catName is not in the right folder");
            exit;
        }
    } else {
        $categ = getCategory($contents);
        if ($folders[count($folders) - 2] !== $categ) {
            printError("$filename is not in the right folder");
            exit(1);
        }
    }
    printSuccess(getFilename($file) . " valid");
}
