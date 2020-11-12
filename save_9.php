<?php

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost; dbname=my_project;", "root" , "Mgmoioba1");
$statement = $pdo->prepare("INSERT INTO task_9 (text) VALUES (:text)");
$statement->execute(['text' => $text]);


header("Location: task_9.php");