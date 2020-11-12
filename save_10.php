<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost; dbname=my_project;", "root" , "Mgmoioba1");

$statement = $pdo->prepare("SELECT * FROM task_9 WHERE text=:text");
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);

if (!empty($task)){
    $message = "Введенная запись уже присутствует в базе данных";
    $_SESSION['danger'] = $message;

    header("Location: task_10.php");
    exit;
}

$statement = $pdo->prepare("INSERT INTO task_9 (text) VALUES (:text)");
$statement->execute(['text' => $text]);

$message = "Введенная запись добавлена в базу данных";
$_SESSION['success'] = $message;

header("Location: task_10.php");