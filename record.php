<?php
header("Content-type:Application/json");
$dir = "record";

$result = [];

$files = scandir($dir);

foreach($files as $fl) {
    if($fl !== "." && $fl !== ".."){
        $fdata = json_decode(file_get_contents($dir."/".$fl), true);
        $fdata["file"] = $fl;
        array_push($result, $fdata);
    }
}

$response = json_encode($result);

echo $response;