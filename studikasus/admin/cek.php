<?php
session_start();

if ($_SESSION['role'] !== 'admin') {
    if (basename($_SERVER['PHP_SELF']) === 'product.php') {
        header("Location: ../../user/login.php");
    } elseif (basename($_SERVER['PHP_SELF']) === 'category.php') {
        header("Location: ../../user/login.php");
    } elseif (basename($_SERVER['PHP_SELF']) === 'brand.php') {
        header("Location: ../../user/login.php");
    } else {
        header("Location: ../user/login.php");
    }
    exit();
}
