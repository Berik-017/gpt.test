<?php
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html>
<body>

<h2>Регистрация</h2>

<form method="POST" action="">
    <input type="text" name="name" placeholder="Имя"><br><br>
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Пароль"><br><br>
    <button type="submit">Зарегистрироваться</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = $_POST["name"];
    $email    = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $sql  = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
            ":name"     => $name,
            ":email"    => $email,
            ":password" => $password
    ]);

    echo "Пользователь $name зарегистрирован! <a href='login.php'>Войти</a>";
}
?>

</body>
</html>