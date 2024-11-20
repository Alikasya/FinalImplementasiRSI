<?php
include 'connect.php'; 
session_start();
if (!isset($_SESSION['idUser'])) {
    die('User belum login');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['cart_id'])) {
        $cartId = $_POST['cart_id'];
        $cartId = mysqli_real_escape_string($conn, $cartId);
        $query = "DELETE FROM cart WHERE id = '$cartId'";

        if (mysqli_query($conn, $query)) {
            header("Location: keranjangCart.php");
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'Cart ID tidak ditemukan']);
    }
}
?>
