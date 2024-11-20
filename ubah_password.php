<?php
session_start();
include 'connect.php'; 

if (!isset($_SESSION['idUser'])) {
    header("Location: login.php"); 
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['idUser'];
    $passwordLama = $_POST['passwordLama'];
    $passwordBaru = $_POST['passwordBaru'];
    $konfirmasiPasswordBaru = $_POST['konfirmasiPasswordBaru'];

    $sql = "SELECT password FROM user WHERE id = $userId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $userPassword = $row['password'];

        if (md5($passwordLama) !== $userPassword) {
            header("Location: contact.php?error=Password lama salah");
            exit();
        }

        if ($passwordBaru !== $konfirmasiPasswordBaru) {
            header("Location: contact.php?error=Password baru tidak cocok");
            exit();
        }

        $hashedPassword = md5($passwordBaru);
        $sqlUpdate = "UPDATE user SET password = '$hashedPassword' WHERE id = $userId";

        if ($conn->query($sqlUpdate) === TRUE) {
            header("Location: contact.php?success=Password berhasil diubah");
        } else {
            header("Location: contact.php?error=Gagal memperbarui password");
        }
    } else {
        header("Location: contact.php?error=User tidak ditemukan");
    }
}

$conn->close();
?>
