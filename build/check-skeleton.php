<?php

if (count($argv) !== 3) {
    die("Format invalide");
}

$callable = match ($argv[2]) {
    'content' => 'checkSkeleton',
    'name' => 'checkName',
    default => null
};

if ($callable === null) {
    throw new RuntimeException("Fournir une tache valide, " . $argv[2] . " donné");
}

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($argv[1], FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    if (substr($file, -3) !== ".md") {
        continue;
    }
    $callable($file);
}

function checkSkeleton(string $file): void
{
    $contents = file_get_contents($file);
    if ($contents === false) {
        throw new RuntimeException("Erreur dans la récupération du contenu du fichier $file");
    }
    print_r("Contenu du fichier $file récupéré\n");
    $filename = getFilename($file);
    $category = substr($filename, strlen($filename) - 9) === "_category";
    if ($category) {
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---/i";
    } else {
        $skeletonHeaderRegex = "/---(\r\n|\r|\n)id: .+(\r\n|\r|\n)title: .+(\r\n|\r|\n)category: .+(\r\n|\r|\n)icon: \".+\"(\r\n|\r|\n)---/i";
    }
    $head = preg_match($skeletonHeaderRegex, $contents);
    if ($head !== 1) {
        throw new RuntimeException("Le fichier $file na pas le bon header");
    }
    $name = getId($contents);
    print_r("Id: $name trouvé et valide\n");
    if (!$category) {
        $categ = getCategory($contents);
        print_r("Categ: $categ trouvé et valide\n");
    }
    print_r("Fichier $file valide\n");
}

function checkName(string $file): void
{
    $contents = file_get_contents($file);
    if ($contents === false) {
        throw new RuntimeException("Erreur dans la récupération du contenu du fichier $file");
    }
    print_r("Contenu du fichier $file récupéré\n");
    $name = getId($contents);
    print_r("Id: $name trouvé et valide\n");
    $filename = getFilename($file);
    if ($filename !== $name) {
        $category = substr($filename, strlen($filename) - 9) !== "_category";
        if ($category) {
            throw new RuntimeException("Le nom du fichier n'est pas valide, actuel: $filename, voulu: $name");
        } else {
            if ($filename !== $name . "_category") {
                throw new RuntimeException("Le nom du fichier n'est pas valide, actuel: $filename, voulu: $name" . "_category");
            }
        }
    }
    print_r("Fichier $file valide\n");
}

function getId(string $contents): string
{
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

function getCategory(string $contents): string
{
    $contents = preg_replace("/(\r\n|\r|\n)/i", '', $contents);
    $catPos = strpos($contents, "category: ");
    $iconPos = strpos($contents, "icon: ");
    if ($catPos === false || $iconPos === false) {
        throw new RuntimeException("Impossible de charger correctement le skelette du fichier");
    }
    $categ = substr($contents, $catPos + 10, $iconPos - $catPos - 10);
    if (preg_match("/^[a-z1-9\-]+$/i", $categ) !== 1) {
        throw new RuntimeException("La catégorie ne correspond pas au format nécessaire");
    }
    return $categ;
}

function getFilename(string $path): string
{
    $file = explode('\\', $path);
    if (count($file) === 1) {
        $file = explode('/', $file[0]);
        if (count($file) === 1) {
            throw new RuntimeException("Les noms de dossiers ne sont pas valides");
        }
    }
    $ret = $file[array_key_last($file)];
    return substr($ret, 0, strlen($ret) - 3);
}
