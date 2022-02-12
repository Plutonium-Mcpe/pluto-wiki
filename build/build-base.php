<?php

function getId(string $contents): string
{
    $contents = preg_replace("/(\r\n|\r|\n)/i", '', $contents);
    $pos = strpos($contents, "title: ");
    if ($pos === false) {
        printError("invalid file skeleton");
        exit(1);
    }
    $name = substr($contents, 7, $pos-7);
    if (preg_match("/^[a-z1-9\-]+$/i", $name) !== 1) {
        printError("invalid format for the id");
        exit(1);
    }
    return $name;
}

function getCategory(string $contents): string
{
    $contents = preg_replace("/(\r\n|\r|\n)/i", '', $contents);
    $catPos = strpos($contents, "category: ");
    $iconPos = strpos($contents, "description: ");
    if ($catPos === false || $iconPos === false) {
        printError("invalid file skeleton");
        exit(1);
    }
    $categ = substr($contents, $catPos + 10, $iconPos - $catPos - 10);
    if (preg_match("/^[a-z1-9\-]+$/i", $categ) !== 1) {
        printError("invalid format for the category");
        exit(1);
    }
    return $categ;
}

function getFilename(string $path): string
{
    $file = getFolder($path);
    $ret = $file[array_key_last($file)];
    return substr($ret, 0, strlen($ret) - 3);
}

function getFolder(string $path): array
{
    $file = explode('\\', $path);
    if (count($file) === 1) {
        $file = explode('/', $file[0]);
        if (count($file) === 1) {
            printError("the folder name is not valid");
            exit(1);
        }
    }
    return $file;
}

function printSuccess(string $message)
{
    print_r("\e[39m [\e[32m+\e[39m] \e[32m$message\e[39m\n");
}
function printError(string $message)
{
    print_r("\e[39m [\e[31m-\e[39m] \e[31m$message\e[39m\n");
}
function printStatement(string $message)
{
    print_r("\e[39m  -  $message\e[39m\n");
}
function printWarning(string $message)
{
    print_r("\e[39m [\e[33m!\e[39m] \e[33m$message\e[39m\n");
}
function confirm(string $message): bool
{
    do {
        $input = getInput($message . " [o/n] ");
    } while ($input != "o" && $input != "n");
    if ($input != "o") {
        return false;
    }
    return true;
}
function getInput(string $message): string
{
    print_r("\e[39m  $message\e[39m");
    $handle = fopen("php://stdin", "r");
    $line = fgets($handle);
    return trim($line);
}
