<?php
session_start();

include 'connect.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_produk = $_POST['nama_produk'];
    $deskripsi_produk = $_POST['deskripsi_produk'];
    $harga = $_POST['harga'];
    $qty = $_POST['qty'];
    $jenis = $_POST['jenis'];
    if (isset($_SESSION['idUser'])) {
        $user_id = $_SESSION['idUser'];
    } else {
        echo "User tidak terautentikasi.";
        exit();
    }

    $foto = $_FILES['foto']['name'];
    $target_dir = "img/"; 
    $target_file = $target_dir . basename($foto);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $query = "INSERT INTO produk (nama_produk, deskripsi_produk, harga, jenis, user_id, foto, qty) VALUES ('$nama_produk', '$deskripsi_produk', '$harga', '$jenis', '$user_id', '$foto', '$qty')";

        if (mysqli_query($conn, $query)) {
            echo "Produk berhasil ditambahkan!";
        } else {
            echo "Gagal menambahkan produk: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengunggah foto.";
    }

    header("Location: produk.php");
    exit();
}
?>
