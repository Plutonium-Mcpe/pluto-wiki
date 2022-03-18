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
    if (!$isCategory) {
        $foundMatches = 0;
        preg_match_all("{{.+#.+}}", $contents, $allMatches);
        $allMatches = $allMatches[0];
        printStatement("find " . count($allMatches) . " patterns to validate");
        if (count($allMatches) === 0) {
            printStatement("skipped, no patern available to test");
        } else {
            preg_match_all("/{{craft#([a-z\-\_])+\/([a-z\/\-\_])+}}/", $contents, $craftMatches);
            $craftMatches = $craftMatches[0];
            if (count($craftMatches) > 0) {
                foreach ($craftMatches as $context) {
                    printStatement("process: $context");
                    $context = substr($context, 2, strlen($context) - 4);
                    $data = explode("/", explode("#", $context)[1]);
                    $folder = $data[0];
                    unset($data[0]);
                    $staticPath = $folder . "/" . implode("/", $data) . ".png";
                    $absolutePath = dirname(__DIR__) . "/static/" . $staticPath;
                    if (is_file($absolutePath)) {
                        $foundMatches++;
                    } else {
                        printError("cant found the craft file: $staticPath");
                        $subError = true;
                        goto end;
                    }
                }
            } else {
                printStatement("no craft patern found");
            }
            preg_match_all("/{{image#([a-zA-Z1-9\/_\.])+}}/", $contents, $imageMatches);
            $imageMatches = $imageMatches[0];
            if (count($imageMatches) > 0) {
                foreach ($imageMatches as $context) {
                    printStatement("process: $context");
                    $context = substr($context, 2, strlen($context) - 4);
                    $path = explode("#", $context)[1];
                    $path = "textures/$path.png";
                    $rootPath = dirname(__DIR__) . "/static/";
                    if (is_file($rootPath . "plutonium/" . $path) || is_file($rootPath . "vanilla/" . $path)) {
                        $foundMatches++;
                    } else {
                        printError("cant found the image file: $path");
                        $subError = true;
                        goto end;
                    }
                }
            } else {
                printStatement("no image patern found");
            }
            if ($foundMatches !== count($allMatches)) {
                printError("format not recognized, not supported or invalid detect, found " . count($allMatches) . " patern and get $foundMatches valid pattern");
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
    } else {
        printStatement("skipped, a format corresponding to a category was found");
        continue;
    }
}
if ($hasError) {
    exit(1);
}
