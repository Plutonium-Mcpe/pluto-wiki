<?php

$zipPath = dirname(__DIR__) . "/static/";
@mkdir($zipPath);
$archive = new ZipArchive();
if ($archive->open($zipPath . "plutonium.zip") === true) {
	echo "Archive plutonium.zip trouvé\n";
	$exportPath = $zipPath . "pack";
	if (is_dir($exportPath)) {
		recremove($exportPath);
		echo "Dossier: $exportPath supprimé\n";
	}
	$archive->extractTo($exportPath);
	$archive->close();
	if (is_dir($exportPath)) {
		echo "Archive décompressé\n";
		$dir = dir($exportPath);
		while (($file = $dir->read()) !== false) {
			if (!in_array($file, [".", ".."], true)) {
				// printing Filesystem objects/functions with PHP
				break;
			}
		}
		$dir->close();
		echo "Dossier trouvé: $file\n";
		reccopy($exportPath . "/" . $file, $exportPath);
		echo "Dossier copié\n";
		recremove($exportPath . "/" . $file);
	} else {
		throw new RuntimeException("Erreur lors de l'extraction");
	}
} else {
	throw new RuntimeException("Archive plutonium.zip non trouvé");
}
$archive = new ZipArchive();
if ($archive->open($zipPath . "vanilla.zip") === true) {
	echo "Archive vanilla.zip trouvé\n";
	$exportPath = $zipPath . "vanilla";
	if (is_dir($exportPath)) {
		recremove($exportPath);
		echo "Dossier: $exportPath supprimé\n";
	}
	$archive->extractTo($exportPath);
	$archive->close();
	if (is_dir($exportPath)) {
		echo "Archive décompressé\n";
	} else {
		throw new RuntimeException("Erreur lors de l'extraction");
	}
} else {
	throw new RuntimeException("Archive vanilla.zip non trouvé");
}

function reccopy($src, $dst) {
	$dir = opendir($src);
	@mkdir($dst);
	while ( $file = readdir($dir) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				reccopy($src . '/' . $file, $dst . '/' . $file);
			} else {
				copy($src . '/' . $file, $dst . '/' . $file);
			}
		}
	}
	closedir($dir);
}

function recremove($src) {
	$dir = opendir($src);
	while ( $file = readdir($dir) ) {
		if (( $file != '.' ) && ( $file != '..' )) {
			if ( is_dir($src . '/' . $file) ) {
				recremove($src . '/' . $file);
			} else {
				unlink($src . '/' . $file);
			}
		}
	}
	rmdir($src);
	closedir($dir);
}