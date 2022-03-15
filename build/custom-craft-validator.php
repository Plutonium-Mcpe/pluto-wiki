<?php

require __DIR__ . "/build-base.php";

$recipePath = dirname(__DIR__) . "/static/data/custom_recipe";
if (!is_dir($recipePath)) {
    printError("$recipePath not found");
    exit(1);
}

$hasError = false;

foreach (new RecursiveIteratorIterator(new RecursiveDirectoryIterator($recipePath, FilesystemIterator::SKIP_DOTS | FilesystemIterator::CURRENT_AS_PATHNAME)) as $file) {
    printWarning("find: $file");
    $subError = false;
    if (substr($file, strlen($file) - 5, 5) !== ".json") {
        printStatement("skipped because extension not recognized");
        continue;
    }
    $data = json_decode(file_get_contents($file), true);
    if ($data === null) {
        printError("invalid json provided");
        $subError = true;
        goto end;
    }
    printStatement("Valid json format");
    if (!isset($data["input"])) {
        printError("'input' element is missing");
        $subError = true;
        goto end;
    }
    if (!isset($data["output"])) {
        printError("'output' element is missing");
        $subError = true;
        goto end;
    }
    if (!isset($data["shape"])) {
        printError("'shape' element is missing");
        $subError = true;
        goto end;
    }
    for ($i=0; $i < 3; $i++) {
        for ($j = 0;$j < 3;$j++) {
            if (!isset($data["shape"][$i][$j])) {
                printError("'shape' $i | $j is missing");
                $subError = true;
                goto end;
            }
            $inputType = $data["shape"][$i][$j];
            if (($inputType !== " " && $inputType !== "") && !isset($data["input"][$inputType])) {
                printError("'input' name $inputType is missing from input element");
                $subError = true;
                goto end;
            }
        }
    }
    printStatement("valid shape data");
    foreach ($data["input"] as $inputType => $dat) {
        if (!isset($dat["folder"])) {
            printError("'folder' element is missing in input");
            $subError = true;
            goto end;
        }
        if (!isset($dat["name"])) {
            printError("'name' element is missing in input");
            $subError = true;
            goto end;
        }
        $texturePath = dirname(__DIR__) . "/static/" . $dat["folder"] . "/textures/" . $dat["name"] . ".png";
        if (!is_file($texturePath)) {
            printError("unknow texture, path not found for: $texturePath");
            $subError = true;
            goto end;
        }
    }
    if (!isset($data["output"][0]["folder"])) {
        printError("'folder' element is missing in output");
        $subError = true;
        goto end;
    }
    if (!isset($data["output"][0]["name"])) {
        printError("'name' element is missing in output");
        $subError = true;
        goto end;
    }
    $texturePath = dirname(__DIR__) . "/static/" . $data["output"][0]["folder"] . "/textures/" . $data["output"][0]["name"] . ".png";
    if (!is_file($texturePath)) {
        printError("unknow texture, path not found for: $texturePath");
        $subError = true;
        goto end;
    }
    end:
    if (!$subError) {
        printSuccess(getFilename($file) . " valid");
    } else {
        $hasError = true;
    }
}
if (!$hasError) {
    printSuccess("craft valid");
} else {
    exit(1);
}
