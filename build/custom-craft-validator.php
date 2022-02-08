<?php

require __DIR__ . "/build-base.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe";
if (!is_dir($recipePath)) {
    throw new RuntimeException("$recipePath est introuvable");
}

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($recipePath, FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    print_r("find $file\n");
    $data = json_decode(file_get_contents($file), true);
    if ($data === null) {
        throw new RuntimeException("Invalid json provided in $file");
    }
    if (!isset($data["input"])) {
        throw new RuntimeException("input element is missing in $file");
    }
    if (!isset($data["output"])) {
        throw new RuntimeException("output element is missing in $file");
    }
    if (!isset($data["shape"])) {
        throw new RuntimeException("shape element is missing in $file");
    }
    for ($i=0; $i < 3; $i++) {
        for ($j = 0;$j < 3;$j++) {
            if (!isset($data["shape"][$i][$j])) {
                throw new RuntimeException("Shape $i | $j is missing in $file");
            }
            $inputType = $data["shape"][$i][$j];
            if (($inputType !== " " && $inputType !== "") && !isset($data["input"][$inputType])) {
                throw new RuntimeException("Input name $inputType is missing from input element in $file");
            }
        }
    }
    foreach ($data["input"] as $inputType => $dat) {
        if (!isset($dat["folder"])) {
            throw new RuntimeException("folder element is missing in input in $file");
        }
        if (!isset($dat["name"])) {
            throw new RuntimeException("name element is missing in input in $file");
        }
        $texturePath = dirname(__DIR__) . "/static/" . $dat["folder"] . "/textures/" . $dat["name"] . ".png";
        if (!is_file($texturePath)) {
            throw new RuntimeException("Unknow texture name : $texturePath in $file");
        }
    }
    if (!isset($data["output"][0]["folder"])) {
        throw new RuntimeException("folder element is missing in output in $file");
    }
    if (!isset($data["output"][0]["name"])) {
        throw new RuntimeException("name element is missing in output in $file");
    }
    $texturePath = dirname(__DIR__) . "/static/" . $data["output"][0]["folder"] . "/textures/" . $data["output"][0]["name"] . ".png";
    if (!is_file($texturePath)) {
        throw new RuntimeException("Unknow texture name : $texturePath in $file");
    }
}
