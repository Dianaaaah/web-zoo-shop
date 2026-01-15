<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Зоомагазин «Добрый Хвост»</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header">
    <div class="logo">
        <a href="index.php">
            <img src="images/logo.jpg" alt="Логотип">
            <span>Добрый Хвост</span>
        </a>
    </div>

    <nav class="nav">
        <a href="index.php">Главная</a>
        <a href="shop.php">Магазин</a>
        <a href="facts.php">Интересные факты</a>
    </nav>

    <div class="auth">
        <?php if (isset($_SESSION['user'])): ?>
            <a href="cart.php">Мои покупки</a>
            <a href="feedback.php">Обратная связь   </a>
            <span>Привет, <?= $_SESSION['user'] ?></span>
            <a href="logout.php">Выйти</a>
        <?php else: ?>
            <a href="login.php">Войти</a>
        <?php endif; ?>
    </div>

</header>
