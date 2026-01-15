<?php
include "header.php";
include "db.php";

$id = $_GET['id'];

$query = "SELECT * FROM products WHERE id = $id";
$result = mysqli_query($mysql, $query);
$product = mysqli_fetch_assoc($result);
?>

<main class="content">
    <h1><?= $product['name'] ?></h1>

    <div class="product-page">
        <div class="product-image">
            <img src="images/<?= $product['image'] ?>" alt="">
        </div>

        <div class="product-info">
            <p><strong>Цена:</strong> <?= $product['price'] ?> ₽</p>
            <p><strong>Описание:</strong></p>
            <p><?= $product['full_desc'] ?></p>
            <p><strong>В наличии:</strong> <?= $product['quantity'] ?> шт.</p>

            <?php if (isset($_SESSION['user'])): ?>
                <button class="btn add-to-cart" data-id="<?= $product['id'] ?>">
                    Добавить в список покупок
                </button>

                <p id="cart-message"></p>
            <?php else: ?>
                <p><em>Войдите, чтобы добавить товар в список покупок</em></p>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
    include "footer.php";
?>
