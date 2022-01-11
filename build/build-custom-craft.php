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
	$craft = new Craft(1, [
		"size_base" => [
			128, 128
		]
	]);
	$base = 0;
	$j = 0;
	for ($i=1; $i <= 9 ; $i++) {
		if ($base > 2) {
			$base = 0;
			$j++;
		}
		$shape = $recipe["shape"][$base][$j];
		if ($shape === " ") {
			$base++;
			continue;
		}
		if (!isset($recipe["input"][$shape]["name"])) {
			throw new RuntimeException("Invalide shape donné: $shape");
		}
		$itemName = $recipe["input"][$shape]["name"];
		$itemfolder = $recipe["input"][$recipe["shape"][$base][$j]]["folder"];
		$itempath = dirname(__DIR__) . "/static/$itemfolder/textures/$itemName.png";
		if (!is_file($itempath)) {
			throw new RuntimeException("Texture: $itemName.png introuvable dans le dossier $itemfolder/textures");
		}
		$item = new Item($itempath);
		$craft->addItem($item, $i);
		$base++;
	}
	$outputname = $recipe["output"][0]["name"];
	$outputfolder = $recipe["output"][0]["folder"];
	$outputpath = dirname(__DIR__) . "/static/$outputfolder/textures/$outputname.png";
	if (!is_file($outputpath)) {
		throw new RuntimeException("Texture: $outputname.png introuvable dans le dossier $outputfolder/textures");
	}
	$craft->addItem(new Item($outputpath), Craft::CRAFT_SLOT_RESULT);

	$craftname = "craft_" . explode("/", $outputname)[array_key_last(explode("/", $outputname))];
	$craft->export(dirname(__DIR__) . "/static/craft/" . $craftname . ".png");
}
