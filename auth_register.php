<?php
require('connect.php');
session_start();


    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $notelp = $_POST['notelp'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $email = $_POST['email'];
    $pass = md5($_POST['pass']); 
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num > 0) {
        $error = "Email sudah terdaftar!";
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }


    $sql = "INSERT INTO user (nama, alamat, deskripsi, telepon, jenis_kelamin, email, password, foto)
            VALUES ('$nama', '$alamat', '$deskripsi', '$notelp', '$jenisKelamin', '$email', '$pass', 'img/user_icon.png')";

// echo $sql;
// die();

    if (mysqli_query($conn, $sql)) {
        $_SESSION["email"] = $email;
        $_SESSION["idUser"] = mysqli_insert_id($conn); // Mendapatkan ID pengguna yang baru
        header('Location: login.php');
        exit;
    } else {
        $error = "Registrasi gagal, silakan coba lagi!";
        header('Location: register.php?error=' . urlencode($error));
        exit;
    }

?>
