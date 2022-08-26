<?php

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";

$todoName = $_POST['todo_name'] ?? '';
$todoName = trim($todoName);
if($todoName) {
    if(file_exists("todo.json")) {
        $json = file_get_contents("todo.json");
        $jsonArr = json_decode($json, true);
    } else {
        $jsonArr = [];
    }
    
    $jsonArr[$todoName] = ["completed" => false];
    // echo "<pre>";
    // var_dump($jsonArr);
    // echo "</pre>";
    file_put_contents("todo.json", json_encode($jsonArr, JSON_PRETTY_PRINT));
}

header("location: index.php");