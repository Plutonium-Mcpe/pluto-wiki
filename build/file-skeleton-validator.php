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
        exit(1);
    }
    printStatement("file content get");
    $filename = getFilename($file);
    $category = substr($filename, strlen($filename) - 9) === "_category";
    if ($category) {
        printStatement("category format detected");
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)description: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---(\r\n|\r|\n)___/i";
    } else {
        printStatement("article format detected");
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)category: .+(\r\n|\r|\n)description: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---(\r\n|\r|\n)___/i";
    }
    $head = preg_match($skeletonHeaderRegex, $contents);
    if ($head !== 1) {
        printError("invalid header given");
        $subError = true;
        exit(1);
    }
    $name = getId($contents);
    if (!$category) {
        $categ = getCategory($contents);
    }
    if (!$subError) {
        printSuccess(getFilename($file) . " valid");
    } else {
        $hasError = true;
    }
}

if ($hasError) {
    exit(1);
}
