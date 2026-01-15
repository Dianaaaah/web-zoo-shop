<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    echo "Сначала войдите в аккаунт";
    exit;
}

$product_id = $_POST['product_id'];
$user = $_SESSION['user'];

$query = "INSERT INTO cart (user, product_id)
          VALUES ('$user', '$product_id')";

mysqli_query($mysql, $query);

echo "Товар добавлен в список покупок ✔";
