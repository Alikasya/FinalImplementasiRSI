<?php
session_start();
require_once 'connect.php';
require_once 'Carts.php';

if (!isset($_SESSION['idUser'])) {
    die('Anda harus login untuk menambahkan ke keranjang.');
}

$productId = $_POST['product_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$userId = $_SESSION['idUser'];

$cart = new Carts($conn);

if ($cart->addToCart($userId, $productId, $quantity, $price)) {
    echo "Item berhasil ditambahkan ke keranjang!";
    header("Location: keranjangCart.php");
} else {
    echo "Gagal menambahkan ke keranjang.";
}
?>
