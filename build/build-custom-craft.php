<?php

use ShockedPlot7560\craftGenerator\Craft;
use ShockedPlot7560\craftGenerator\Item;

require __DIR__ . "/vendor/autoload.php";
require __DIR__ . "/build-base.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe";
if (!is_dir($recipePath)) {
    throw new RuntimeException("$recipePath est introuvable");
}

@mkdir(dirname(__DIR__) . "/static/craft");

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($recipePath, FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    print_r("find $file\n");
    $data = json_decode(file_get_contents($file), true);
    if ($data === null) {
        throw new RuntimeException("Invalid json provided in $file");
    }
    $craft = new Craft(1, [
        "size_base" => [
            32, 32
        ]
    ]);
    $base = 0;
    $j = 0;
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
            throw new RuntimeException("Invalide shape donné: $shape");
        }
        $itemName = $data["input"][$shape]["name"];
        $itemfolder = $data["input"][$data["shape"][$base][$j]]["folder"];
        $itempath = dirname(__DIR__) . "/static/$itemfolder/textures/$itemName.png";
        if (!is_file($itempath)) {
            throw new RuntimeException("Texture: $itemName.png introuvable dans le dossier $itemfolder/textures");
        }
        $item = new Item($itempath);
        $craft->addItem($item, $i);
        $base++;
    }
    $outputname = $data["output"][0]["name"];
    $outputfolder = $data["output"][0]["folder"];
    $outputpath = dirname(__DIR__) . "/static/$outputfolder/textures/$outputname.png";
    if (!is_file($outputpath)) {
        throw new RuntimeException("Texture: $outputname.png introuvable dans le dossier $outputfolder/textures");
    }
    $craft->addItem(new Item($outputpath), Craft::CRAFT_SLOT_RESULT);

    $filename = getFilename($file);
    $resultname = substr($filename, 0, mb_strlen($filename) - 2);
    $craftname = "craft_" . $resultname;
    $craft->export(dirname(__DIR__) . "/static/craft/" . $craftname . ".png");
    print_r("add: $craftname\n");
}
