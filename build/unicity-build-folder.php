<?php

require __DIR__ . "/build-base.php";

$cache = [];

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
    }else{
        $filename = getFilename($file);
        $category = substr($filename, strlen($filename) - 9) === "_category";
        $name = getId($contents);
        if ($category) {
            $categName = substr($filename, strlen($filename) - 9);
            if (isset($cache[$categName][$name . "_category"])) {
                $errors[] = "Category index for: $categName already exist ($file)";
                $subError = true;
            }
        } else {
            $categ = getCategory($contents);
            if (isset($cache[$categ][$name])) {
                $errors[] = "$name for category: $categ already exist ($file)";
                $subError = true;
            }else{
                $cache[$categ][$name] = $file;
            }
        }
    }
    if ($subError) {
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
        $errors[] = "Category: $categ has no index";
        $hasError = true;
        continue;
    }
}

printErrors($errors);
if ($hasError) {
    exit(1);
}
