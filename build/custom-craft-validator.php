<?php

require __DIR__ . "/build-base.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe";
if (!is_dir($recipePath)) {
    printError("$recipePath not found");
    exit(1);
}

$hasError = false;
$errors = [];
foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($recipePath, FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    $subError = false;
    if (substr($file, strlen($file) - 5, 5) !== ".json") {
        continue;
    }
    $data = json_decode(file_get_contents($file), true);
    if ($data === null) {
        $errors[] = "Invalid json provided ($file)";
        $subError = true;
        goto end;
    }
    if (!isset($data["input"])) {
        $errors[] = "'input' element is missing ($file)";
        $subError = true;
        goto end;
    }
    if (!isset($data["output"])) {
        $errors[] = "'output' element is missing ($file)";
        $subError = true;
        goto end;
    }
    if (!isset($data["shape"])) {
        $errors[] = "'shape' element is missing ($file)";
        $subError = true;
        goto end;
    }
    for ($i=0; $i < 3; $i++) {
        for ($j = 0;$j < 3;$j++) {
            if (!isset($data["shape"][$i][$j])) {
                $errors[] = "'shape' $i | $j is missing ($file)";
                $subError = true;
                goto end;
            }
            $inputType = $data["shape"][$i][$j];
            if (($inputType !== " " && $inputType !== "") && !isset($data["input"][$inputType])) {
                $errors[] = "'input' name $inputType is missing from input element ($file)";
                $subError = true;
                goto end;
            }
        }
    }
    foreach ($data["input"] as $inputType => $dat) {
        if (!isset($dat["folder"])) {
            $errors[] = "'folder' element is missing in input ($file)";
            $subError = true;
            goto end;
        }
        if (!isset($dat["name"])) {
            $errors[] = "'name' element is missing in input ($file)";
            $subError = true;
            goto end;
        }
        $texturePath = dirname(__DIR__) . "/static/" . $dat["folder"] . "/textures/" . $dat["name"] . ".png";
        if (!is_file($texturePath)) {
            $errors[] = "unknow texture, path not found for: $texturePath ($file)";
            $subError = true;
            goto end;
        }
    }
    if (!isset($data["output"][0]["folder"])) {
        $errors[] = "'folder' element is missing in output ($file)";
        $subError = true;
        goto end;
    }
    if (!isset($data["output"][0]["name"])) {
        $errors[] = "'name' element is missing in output ($file)";
        $subError = true;
        goto end;
    }
    $texturePath = dirname(__DIR__) . "/static/" . $data["output"][0]["folder"] . "/textures/" . $data["output"][0]["name"] . ".png";
    if (!is_file($texturePath)) {
        $errors[] = "unknow texture, path not found for: $texturePath ($file)";
        $subError = true;
        goto end;
    }
    end:
    if ($subError) {
        $hasError = true;
    }
}

printErrors($errors);
if ($hasError) {
    exit(1);
}
