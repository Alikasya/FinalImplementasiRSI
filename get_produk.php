<?php
include 'connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        echo json_encode($product);
    } else {
        echo json_encode(['error' => 'Produk tidak ditemukan.']);
    }
}
?>
