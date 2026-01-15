<?php
    try {
        $mysql = mysqli_connect("localhost", "root", "", "zoo_shop");
    } catch (mysqli_sql_exception $e) {
        die("Ошибка подключения к MySQL: " . $e->getMessage());
    }
?>