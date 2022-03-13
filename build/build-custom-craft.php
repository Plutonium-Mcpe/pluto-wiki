<?php

use ShockedPlot7560\craftGenerator\Craft;
use ShockedPlot7560\craftGenerator\Item;

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/build-base.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe";
if (!is_dir($recipePath)) {
    printError("$recipePath est introuvable");
    exit(1);
}

@mkdir(dirname(__DIR__) . "/static/craft");

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($recipePath, FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    printWarning("find: $file");
    if (substr($file, strlen($file) - 5, 5) !== ".json") {
        printStatement("skipped because extension not recognized");
        continue;
    }
    $data = json_decode(file_get_contents($file), true);
    if ($data === null) {
        printError("invalid json provided in $file");
        exit(1);
    }
    $craft = new Craft(1, [
        "size_base" => [
            32, 32
        ]
    ]);
    $base = 0;
    $j = 0;
    printStatement("analyse shape");
    for ($i=1; $i <= 9 ; $i++) {
        if ($base > 2) {
            $base = 0;
            $j++;
        }
        $shape = $data["shape"][$base][$j];
        if ($shape === " ") {
            $base++;
            continue;
        }
        if (!isset($data["input"][$shape]["name"])) {
            printError("invalid shape given: $file");
            exit(1);
        }
        $itemName = $data["input"][$shape]["name"];
        $itemfolder = $data["input"][$data["shape"][$base][$j]]["folder"];
        $itempath = dirname(__DIR__) . "/static/$itemfolder/textures/$itemName.png";
        if (!is_file($itempath)) {
            printError("texture: $itemName.png not found in folder: $itemfolder/textures");
            exit(1);
        }
        $item = new Item($itempath);
        $craft->addItem($item, $i);
        $base++;
    }
    $outputname = $data["output"][0]["name"];
    $outputfolder = $data["output"][0]["folder"];
    $outputpath = dirname(__DIR__) . "/static/$outputfolder/textures/$outputname.png";
    if (!is_file($outputpath)) {
        printError("texture: $outputname.png not found in folder: $outputfolder/textures");
        exit(1);
    }
    $craft->addItem(new Item($outputpath), Craft::CRAFT_SLOT_RESULT);

    printStatement("export to craft");
    $filename = getFilename($file);
    $resultname = substr($filename, 0, mb_strlen($filename) - 2);
    $craftname = "craft_" . $resultname;
    $exportPath = dirname(__DIR__) . "/static/craft/" . $craftname . ".png";
    $craft->export($exportPath);
    if (is_file($exportPath)) {
        printSuccess("$craftname created");
    } else {
        printError("an error occured in $craftname export");
        exit(1);
    }
}
