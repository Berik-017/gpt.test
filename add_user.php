<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "mysite";
$port = 3307;

$conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Добавляем пользователя
$name = "Bek";
$email = "bek@mail.ru";

$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $conn->prepare($sql);
$stmt->execute([":name" => $name, ":email" => $email]);

echo "Пользователь добавлен!";
?>
