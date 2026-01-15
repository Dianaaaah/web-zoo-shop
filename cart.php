<?php
include "header.php";
include "db.php";

if (!isset($_SESSION['user'])) {
    echo "<p style='padding:20px'>Доступ только для авторизованных</p>";
    include "footer.php";
    exit;
}

$user = $_SESSION['user'];

$query = "SELECT products.id, products.name, products.price
          FROM cart
          JOIN products ON cart.product_id = products.id
          WHERE cart.user = '$user'";

$result = mysqli_query($mysql, $query);
?>

<main class="content">
    <h1>Мой список покупок</h1>

    <?php if (mysqli_num_rows($result) == 0): ?>
        <p>Список покупок пуст</p>
    <?php endif; ?>

    <?php while ($item = mysqli_fetch_assoc($result)): ?>
        <div class="cart-item" data-id="<?= $item['id'] ?>" style="margin-bottom:10px;">
            <span><?= $item['name'] ?> — <?= $item['price'] ?> ₽</span>
            <button class="btn remove-from-cart" data-id="<?= $item['id'] ?>" style="margin-left:10px;">Удалить</button>
        </div>
    <?php endwhile; ?>

    <p id="cart-message"></p>
</main>

<?php include "footer.php"; ?>
