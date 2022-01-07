<?php

require __DIR__ . "/build-base.php";

if (count($argv) !== 2) {
    die("Fournir un chemin valide");
}

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    if (substr($file, -3) !== ".md") {
        continue;
    }
    $contents = file_get_contents($file);
    if ($contents === false) {
        throw new RuntimeException("Erreur dans la récupération du contenu du fichier $file");
    }
    print_r("Contenu du fichier $file récupéré\n");
    $name = getId($contents);
    print_r("Id: $name trouvé et valide\n");
    $filename = getFilename($file);
    $isCategory = substr($filename, strlen($filename) - 9) === "_category";
    if ($filename !== $name) {
        if (!$isCategory) {
            throw new RuntimeException("Le nom du fichier n'est pas valide, actuel: $filename, voulu: $name");
        } else {
            if ($filename !== $name . "_category") {
                throw new RuntimeException("Le nom du fichier n'est pas valide, actuel: $filename, voulu: $name" . "_category");
            }
        }
    }
    $folders = getFolder($file);
    if (count($folders) - 2 < 0) {
        throw new RuntimeException("L'arborescence des dossiers est invalides");
    }
    if ($isCategory) {
        $catNam = substr($filename, 0, strlen($filename) - 9);
        if ($folders[count($folders) - 2] !== $catNam) {
            throw new RuntimeException("$catNam n'est pas dans le bon dossier");
        }
    } else {
        $categ = getCategory($contents);
        if ($folders[count($folders) - 2] !== $categ) {
            throw new RuntimeException("$filename n'est pas dans le bon dossier");
        }
    }
    print_r("Fichier $file valide\n");
}
