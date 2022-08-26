<?php

// echo "<pre>";
// var_dump($_POST);
// echo "</pre>";
$json = file_get_contents("todo.json");
$jsonArr = json_decode($json, true);

$todoName = $_POST['todo_name'];
unset($jsonArr[$todoName]);

file_put_contents("todo.json", json_encode($jsonArr, JSON_PRETTY_PRINT));

header("location: index.php");