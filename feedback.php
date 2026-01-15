<?php
include "header.php";
include "db.php";

if (!isset($_SESSION['user'])) {
    echo "<p style='padding:20px'>Доступ только для авторизованных пользователей.</p>";
    include "footer.php";
    exit;
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $feedback = $_POST['message'];
    $message = "Спасибо за ваш отзыв, $name!";
}
?>

<main>
    <div class="form-container">
        <h1>Обратная связь</h1>

        <?php if ($message): ?>
            <p style="color:green; text-align:center;"><?= $message ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="name" placeholder="Ваше имя" required>
            <input type="email" name="email" placeholder="Ваш Email" required>
            <textarea name="message" placeholder="Ваше сообщение" rows="5" style="padding:14px; border-radius:8px; border:1px solid #ddd;"></textarea>
            <button type="submit">Отправить</button>
        </form>
    </div>
</main>

<?php include "footer.php"; ?>
