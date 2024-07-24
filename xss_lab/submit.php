<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] !== "POST" and !isset($_POST["comment"])) {
    header("location: ./");
}else{

    $data = json_decode(file_get_contents("data.json"), true);
    $data[] = array(
        "user" => $_SESSION["role"],
        "time" => (new \DateTime("now", new DateTimeZone('Asia/Taipei')))->format( 'Y-m-d H:i:s' ),
        "comment" => $_POST["comment"]
    );
    file_put_contents("data.json", json_encode($data, JSON_PRETTY_PRINT));
    echo "Success";
}
