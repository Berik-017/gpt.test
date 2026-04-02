<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "mysite";
$port = 3307;

$conn = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Получаем всех пользователей
$sql = "SELECT * FROM users";
$stmt = $conn->prepare($sql);
$stmt->execute();

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo "ID: " . $user["id"] . "<br>";
    echo "Имя: " . $user["name"] . "<br>";
    echo "Email: " . $user["email"] . "<br>";
    echo "---<br>";
}
