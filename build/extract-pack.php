<?php

require(__DIR__) . "/build-base.php";

$zipPath = dirname(__DIR__) . "/static/";
@mkdir($zipPath);
$archive = new ZipArchive();
if ($archive->open($zipPath . "plutonium.zip") === true) {
    printWarning("'plutonium' archive found");
    $exportPath = $zipPath . "plutonium";
    if (is_dir($exportPath)) {
        recremove($exportPath);
        printStatement("folder: $exportPath delete");
    }
    $archive->extractTo($exportPath);
    $archive->close();
    if (is_dir($exportPath)) {
        printSuccess("'plutonium' archive extract");
        $dir = dir($exportPath);
        while (($file = $dir->read()) !== false) {
            if (!in_array($file, [".", ".."], true)) {
                // printing Filesystem objects/functions with PHP
                break;
            }
        }
        $dir->close();
        printStatement("folder: $file found");
        reccopy($exportPath . "/" . $file, $exportPath);
        printStatement("folder: $file copied");
        recremove($exportPath . "/" . $file);
        printStatement("folder: $file deleted");
    } else {
        printError("An error occured in pack extraction");
        exit(1);
    }
} else {
    printError("'plutonium' archive not found");
    exit(1);
}
$archive = new ZipArchive();
if ($archive->open($zipPath . "vanilla.zip") === true) {
    printWarning("'vanilla' archive found");
    $exportPath = $zipPath . "vanilla";
    if (is_dir($exportPath)) {
        recremove($exportPath);
        printStatement("folder: $exportPath deleted");
    }
    $archive->extractTo($exportPath);
    $archive->close();
    if (is_dir($exportPath)) {
        printSuccess("'vanilla' archive extract");
    } else {
        printError("An error occured in pack extraction");
        exit(1);
    }
} else {
    printError("'vanilla' archive not found");
    exit(1);
}

function reccopy($src, $dst)
{
    if (!is_dir($src)) {
        return;
    }
    $dir = opendir($src);
    @mkdir($dst);
    while ($file = readdir($dir)) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                reccopy($src . '/' . $file, $dst . '/' . $file);
            } else {
                copy($src . '/' . $file, $dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}

function recremove($src)
{
    if (!is_dir($src)) {
        return;
    }
    $dir = opendir($src);
    while ($file = readdir($dir)) {
        if (($file != '.') && ($file != '..')) {
            if (is_dir($src . '/' . $file)) {
                recremove($src . '/' . $file);
            } else {
                unlink($src . '/' . $file);
            }
        }
    }
    rmdir($src);
    closedir($dir);
}
