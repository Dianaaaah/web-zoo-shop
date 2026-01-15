<?php
    include "header.php";
    include "db.php";

    $query = "SELECT * FROM products";
    $result = mysqli_query($mysql, $query);
?>

<main class="content">
    <h1>Магазин</h1>

    <table class="product-table">
        <tr>
            <th>Изображение</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th></th>
        </tr>

        <?php while ($product = mysqli_fetch_assoc($result)): ?>
        <tr>
            <td>
                <img src="images/<?= $product['image'] ?>" class="product-img">
            </td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['short_desc'] ?></td>
            <td><?= $product['price'] ?> ₽</td>
            <td>
                <a class="btn" href="product.php?id=<?= $product['id'] ?>">
                    Подробнее
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</main>

<?php
    include "footer.php";
?>
