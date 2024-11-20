<?php
include 'connect.php';  
include 'Carts.php';     
$cart = new Carts($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkoutBtn'])) {
    session_start();  
    $userId = $_SESSION['idUser'];  
    $cart->processCheckout($userId);
}
?>
