<?php
include "header.php";
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $check = "SELECT * FROM users WHERE login='$login'";
    $result = mysqli_query($mysql, $check);

    if (mysqli_num_rows($result) > 0) {
        $message = "Пользователь с таким логином уже существует";
    } else {
        $query = "INSERT INTO users (login, password) VALUES ('$login', '$password')";
        mysqli_query($mysql, $query);
        $message = "Регистрация успешна. Теперь вы можете войти.";
    }
}
?>

<main>
  <div class="form-container">
    <h1>Регистрация</h1>
    <form method="post">
      <input type="text" name="login" placeholder="Логин" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button type="submit">Зарегистрироваться</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
       Уже есть аккаунт? <a href="login.php">Войти</a>
    </p>
  </div>
</main>

<?php include "footer.php"; ?>
