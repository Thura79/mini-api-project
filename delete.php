<?php

header("Content-type:Application/json");
$dir = "record";


if($_SERVER["REQUEST_METHOD"] === "DELETE"){
    if(!empty($_GET["file"])){
        if(is_file($dir."/".$_GET["file"])){
            unlink(($dir."/".$_GET["file"]));
            echo "file deleted";

        }else{
            echo "file not found";
    header("HTTP/1.1 404 File Not Found");

        }
    }else {
        echo json_encode(["error" => "file is required"]);
    }
}