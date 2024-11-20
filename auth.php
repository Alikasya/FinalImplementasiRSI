<?php
require('connect.php');
session_start();

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['pass']); 
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 0) {
        $error = "User tidak ditemukan!";
        header('Location: login.php?error=' . urlencode($error));
        exit;
    }

    $user = mysqli_fetch_assoc($result);
  
    if ($pass != $user['password']) { 
        $error = "Password anda salah!";
        header('Location: login.php?error=' . urlencode($error));
        exit;
    }

    $_SESSION["email"] = $user['email'];
    $_SESSION["idUser"] = $user['id']; 
   

    header('Location: index.php');
    exit;
}
?>
