<?php
include 'connect.php';

$id = $_POST['id']; 

$query = "SELECT * FROM produk WHERE id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

$nama_produk = $_POST['nama_produk'];
$deskripsi_produk = $_POST['deskripsi_produk'];
$harga = $_POST['harga'];
$qty = $_POST['qty'];
$jenis = $_POST['jenis'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["foto"]["name"]);
    move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file);
    $foto = $_FILES["foto"]["name"];
} else {

    $foto = $row['foto']; 
}

$query_update = "UPDATE produk SET 
    nama_produk = '$nama_produk', 
    deskripsi_produk = '$deskripsi_produk', 
    harga = '$harga', 
    qty = '$qty', 
    jenis = '$jenis', 
    foto = '$foto' 
    WHERE id = $id";

if (mysqli_query($conn, $query_update)) {
   
    header("Location: produk.php");
} else {

    echo "Error: " . mysqli_error($conn);
}
?>
