<?php
require_once "config.php";
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<h2>Вход</h2>

<form method="POST" action="">
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Пароль"><br><br>
    <button type="submit">Войти</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = $_POST["email"];
    $password = $_POST["password"];

    // Ищем пользователя по email
    $sql  = "SELECT * FROM users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->execute([":email" => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["password"])) {
        // Пароль верный — создаём сессию
        $_SESSION["user_id"]   = $user["id"];
        $_SESSION["user_name"] = $user["name"];
        header("Location: cabinet.php");
        exit();
    } else {
        echo "Неверный email или пароль!";
    }
}
?>

</body>
</html>