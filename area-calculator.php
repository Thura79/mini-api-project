<?php

header("Content-type:Application/json");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = [
        "width" => $_POST["width"] . "ft",
        "breadth" => $_POST["breadth"] . "ft",
        "area" => ($_POST["width"] * $_POST["breadth"]) . "sqft",
    ];


    $record = 'record';
    if (!is_dir($record)) {
        mkdir($record);
    }

    $photo = 'photo';
    if (!is_dir($photo)) {
        mkdir($photo);
    }
    if ($_FILES["photo"]["error"] === 0) {

        $newphoto = $photo . "/" . uniqid() . time() . "." . pathinfo($_FILES["photo"]["name"])["extension"];

        move_uploaded_file($_FILES["photo"]["tmp_name"], $newphoto);

        $result["photo"] = $newphoto;
    }

    $response = json_encode($result);

    $newfile = $record . "/" . uniqid() . time() . ".json";

    $stream = fopen($newfile, "w");
    fwrite($stream, $response);

    fclose($stream);

    header("HTTP/1.1 201 File Created");
    echo $response;
}
