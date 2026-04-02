<?php
session_start();

// Если не вошёл — отправляем на логин
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>Личный кабинет</h2>
<p>Привет, <?= $_SESSION["user_name"] ?>!</p>
<p>Ты успешно вошёл в систему.</p>

<a href="logout.php">Выйти</a>

</body>
</html>