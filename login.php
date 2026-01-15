<?php
include "header.php";
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE login='$login' AND password='$password'";
    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['user'] = $login;
        header("Location: index.php");
        exit();
    } else {
        $error = "Неверный логин или пароль";
    }
}
?>

<main>
  <div class="form-container">
    <h1>Вход</h1>
    <form method="post">
      <input type="text" name="login" placeholder="Логин" required>
      <input type="password" name="password" placeholder="Пароль" required>
      <button type="submit">Войти</button>
    </form>

    <p style="text-align:center; margin-top:10px;">
       Еще нет аккаунта? <a href="reg.php">Зарегистрироваться</a>
    </p>
  </div>
</main>


<?php include "footer.php"; ?>

