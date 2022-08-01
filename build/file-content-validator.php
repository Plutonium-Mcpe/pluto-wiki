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
    if (!$isCategory) {
        $foundMatches = 0;
        preg_match_all("/{{[a-z1-9]+#[a-zA-Z1-9\/_\.]+}}/", $contents, $allMatches);
        $allMatches = $allMatches[0];
        $foundMatchesArray = [];
        if (count($allMatches) !== 0) {
            preg_match_all("/{{craft#([a-z\-\_])+\/([a-z\/\-\_])+}}/", $contents, $craftMatches);
            $craftMatches = $craftMatches[0];
            if (count($craftMatches) > 0) {
                foreach ($craftMatches as $context) {
                    if(in_array($context, $foundMatchesArray)){
                        continue;
                    }
                    $baseContext = $context;
                    $context = substr($context, 2, strlen($context) - 4);
                    $data = explode("/", explode("#", $context)[1]);
                    $folder = $data[0];
                    unset($data[0]);
                    $staticPath = $folder . "/" . implode("/", $data) . ".png";
                    $absolutePath = dirname(__DIR__) . "/static/" . $staticPath;
                    if (is_file($absolutePath)) {
                        $foundMatchesArray[] = $baseContext;
                    } else {
                        $errors[] = "Cant found the craft file: $staticPath ($file)";
                        $subError = true;
                        goto end;
                    }
                }
            }
            preg_match_all("/{{image#([a-zA-Z1-9\/_\.])+}}/", $contents, $imageMatches);
            $imageMatches = $imageMatches[0];
            if (count($imageMatches) > 0) {
                foreach ($imageMatches as $context) {
                    if(in_array($context, $foundMatchesArray)){
                        continue;
                    }
                    $baseContext = $context;
                    $context = substr($context, 2, strlen($context) - 4);
                    $path = explode("#", $context)[1];
                    $path = "textures/$path.png";
                    $rootPath = dirname(__DIR__) . "/static/";
                    if (is_file($rootPath . "plutonium/" . $path) || is_file($rootPath . "vanilla/" . $path)) {
                        $foundMatchesArray[] = $baseContext;
                    } else {
                        $errors[] = "Cant found the image file: $path ($file)";
                        $subError = true;
                        goto end;
                    }
                }
            }
            if (count(array_unique($foundMatchesArray)) !== count(array_unique($allMatches))) {
                $errors[] = "Format not recognized, not supported or invalid detect, found " . count($allMatches) . " patern and get ".count($foundMatchesArray)." valid pattern ($file)";
                $subError = true;
                goto end;
            }
        }
        end:
        if ($subError) {
            $hasError = true;
        }
    }
}
printErrors($errors);
if ($hasError) {
    exit(1);
}