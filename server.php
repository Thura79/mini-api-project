<?php

header("Content-type:Application/json");

$dir = "store";
$baseUrl = "http://" . $_SERVER["HTTP_HOST"] . "/";



$response = [];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    foreach($_FILES["photos"]["tmp_name"] as $key => $fl){
        $newName = $dir . "/" . uniqid() . "." . pathinfo($_FILES["photos"]["name"][$key])["extension"];
       if( move_uploaded_file($fl, $newName)){
        array_push($response, $baseUrl . $newName);
       }
    }
}

echo json_encode($response);