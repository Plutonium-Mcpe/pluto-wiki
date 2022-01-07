<?php

require __DIR__ . "/build-base.php";

$cache = [];

if (count($argv) !== 2) {
    die("Fournir un chemin valide");
}

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    if (substr($file, -3) !== ".md") {
        continue;
    }
    $contents = file_get_contents($file);
    print_r("Contenu du fichier $file récupéré\n");
    $filename = getFilename($file);
    $category = substr($filename, strlen($filename) - 9) === "_category";
    $name = getId($contents);
    if ($category) {
        $categName = substr($filename, strlen($filename) - 9);
        if (isset($cache[$categName][$name . "_category"])) {
            throw new RuntimeException("L'index pour la catégorie $categName existe déjà");
        }
    } else {
        $categ = getCategory($contents);
        if (isset($cache[$categ][$name])) {
            throw new RuntimeException("$name pour la catégorie $categ existe déjà");
        }
        $cache[$categ][$name] = $file;
    }
    print_r("Fichier $file valide\n");
}
