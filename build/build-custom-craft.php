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
	$outputname = $recipe["output"][0]["name"];
	$outpath = dirname(__DIR__) . "/static/plutonium/textures/" . $outputname . ".png";
	if (!is_file($outpath)) {
		throw new RuntimeException("$outpath est introuvable");
	}
	$craftname = "craft_" . explode("/", $outputname)[array_key_last(explode("/", $outputname))];
	echo "found: $craftname";
	$craft = new Craft(1, [
		"size_base" => [
			32, 32
		]
	]);
	$base = 0;
	$j = 0;
	for ($i=1; $i <= 9 ; $i++) {
		$itemName = $recipe["input"][$recipe["shape"][$j][$base]]["name"];
		if ($base > 2) {
			$base = 0;
			$j++;
		}
		$itempath = dirname(__DIR__) . "/static/plutonium/textures/" . $itemName . ".png";
		if (!is_file($itempath)) {
			throw new RuntimeException("$itempath est introuvable");
		}
		$item = new Item($itempath);
		$craft->addItem($item, $i);
	}
	$craft->addItem(new Item($outpath), Craft::CRAFT_SLOT_RESULT);
	$craft->export(dirname(__DIR__) . "/static/craft/" . $craftname . ".png");
	echo "exported!";
}