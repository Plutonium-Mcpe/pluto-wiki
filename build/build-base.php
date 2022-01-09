<?php

function getId(string $contents): string {
	$contents = preg_replace("/(\r\n|\r|\n)/i", '', $contents);
	$pos = strpos($contents, "title: ");
	if ($pos === false) {
		throw new RuntimeException("Impossible de charger correctement le skelette du fichier");
	}
	$name = substr($contents, 7, $pos-7);
	if (preg_match("/^[a-z1-9\-]+$/i", $name) !== 1) {
		throw new RuntimeException("L'id ne correspond pas au format nécessaire");
	}
	return $name;
}

function getCategory(string $contents): string {
	$contents = preg_replace("/(\r\n|\r|\n)/i", '', $contents);
	$catPos = strpos($contents, "category: ");
	$iconPos = strpos($contents, "description: ");
	if ($catPos === false || $iconPos === false) {
		throw new RuntimeException("Impossible de charger correctement le skelette du fichier");
	}
	$categ = substr($contents, $catPos + 10, $iconPos - $catPos - 10);
	if (preg_match("/^[a-z1-9\-]+$/i", $categ) !== 1) {
		throw new RuntimeException("La catégorie ne correspond pas au format nécessaire");
	}
	return $categ;
}

function getFilename(string $path): string {
	$file = getFolder($path);
	$ret = $file[array_key_last($file)];
	return substr($ret, 0, strlen($ret) - 3);
}

function getFolder(string $path): array {
	$file = explode('\\', $path);
	if (count($file) === 1) {
		$file = explode('/', $file[0]);
		if (count($file) === 1) {
			throw new RuntimeException("Les noms de dossiers ne sont pas valides");
		}
	}
	return $file;
}
