<?php

use ShockedPlot7560\craftGenerator\Craft;
use ShockedPlot7560\craftGenerator\Item;

require __DIR__ . "/vendor/autoload.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe.json";
if (!is_file($recipePath)) {
    throw new RuntimeException("custom_recipe.json introuvable");
}
$recipes = json_decode(file_get_contents($recipePath), true);

@mkdir(dirname(__DIR__) . "/static/craft");
foreach ($recipes as $recipe) {
    $craft = new Craft(1);
    $base = 0;
    $j = 0;
    for ($i=1; $i <= 9 ; $i++) {
        $itemName = $recipe["input"][$recipe["shape"][$j][$base]]["name"];
        if ($base > 2) {
            $base = 0;
            $j++;
        }
        $item = new Item(dirname(__DIR__) . "/static/plutonium/textures/" . $itemName . ".png");
        $craft->addItem($item, $i);
    }
    $outputname = $recipe["output"][0]["name"];
    $craft->addItem(new Item(dirname(__DIR__) . "/static/plutonium/textures/" . $outputname . ".png"), Craft::CRAFT_SLOT_RESULT);
    
    $craftname = "craft_" . explode("/", $outputname)[array_key_last(explode("/", $outputname))];
    $craft->export(dirname(__DIR__) . "/static/craft/" . $craftname . ".png");
}
