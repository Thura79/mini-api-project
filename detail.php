<?php

header("Content-type:Application/json");
$dir = "record";


if(!empty($_GET["file"])){
    if(is_file($dir."/".$_GET["file"])){
        echo file_get_contents($dir."/".$_GET["file"]);
    }
}else {
    echo json_encode(["error" => "file is required"]);
}