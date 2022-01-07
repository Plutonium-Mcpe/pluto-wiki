<?php

if (count($argv) !== 2) {
    die("Fournir un chemin");
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
    $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)category: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---/i";
    $head = preg_match($skeletonHeaderRegex, $contents);
    if ($head !== 1) {
        throw new RuntimeException("Le fichier $file na pas le bon header");
    }
    print_r("Fichier $file valide\n");
}
