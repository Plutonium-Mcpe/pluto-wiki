<?php

require __DIR__ . "/build-base.php";

$cache = [];

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
        continue;
    }
    printStatement("file content get");
    $filename = getFilename($file);
    $category = substr($filename, strlen($filename) - 9) === "_category";
    $name = getId($contents);
    if ($category) {
        printStatement("category format detected");
        $categName = substr($filename, strlen($filename) - 9);
        if (isset($cache[$categName][$name . "_category"])) {
            printError("category index for: $categName already exist");
            $subError = true;
            continue;
        }
    } else {
        printStatement("article format detected");
        $categ = getCategory($contents);
        if (isset($cache[$categ][$name])) {
            printError("$name for category: $categ already exist");
            $subError = true;
            continue;
        }
        $cache[$categ][$name] = $file;
    }
    if (!$subError) {
        printSuccess(getFilename($file) . " valid");
    } else {
        $hasError = true;
    }
}

foreach ($cache as $categ => $art) {
    $asIndex = false;
    foreach ($art as $name => $file) {
        $path = $file;
        $path = str_replace($name . ".md", "", $path);
        if (file_exists($path . $categ . "_category.md")) {
            $asIndex = true;
            continue;
        }
    }
    if (!$asIndex) {
        printError("category: $categ has no index");
        $hasError = true;
        continue;
    }
}

if($hasError){
    exit(1);
}