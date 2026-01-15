<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    echo "Сначала войдите в аккаунт";
    exit;
}

$product_id = $_POST['product_id'];
$user = $_SESSION['user'];

$query = "DELETE FROM cart WHERE user='$user' AND product_id='$product_id' LIMIT 1";
mysqli_query($mysql, $query);

echo "Товар удалён из списка покупок ✔";
