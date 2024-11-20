<?php
session_start();
include 'connect.php';

$userId = $_SESSION['idUser'];

if (isset($_POST['save'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $deskripsi = $_POST['deskripsi'];
    $notelp = $_POST['notelp'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $email = $_POST['email'];

    $targetFile = '';

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $foto = $_FILES['foto'];
        $targetDir = "img/";
        $targetFile = $targetDir . basename($foto["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            if (move_uploaded_file($foto["tmp_name"], $targetFile)) {
                $sql = "SELECT foto FROM user WHERE id = $userId";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $oldPhoto = $result->fetch_assoc()['foto'];
                    if ($oldPhoto && file_exists("img/" . $oldPhoto)) {
                        unlink("img/" . $oldPhoto); 
                    }
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit; 
            }
        } else {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit; 
        }
    } else {
        $targetFile = $_POST['old_foto']; 
    }

    $sql = "UPDATE user SET 
                nama = '$nama', 
                alamat = '$alamat', 
                deskripsi = '$deskripsi', 
                telepon = '$notelp', 
                jenis_kelamin = '$jenisKelamin', 
                email = '$email', 
                foto = '$targetFile' 
            WHERE id = $userId";

    if ($conn->query($sql) === TRUE) {
        header("Location: contact.php?success=Profile updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();

?>