<?php
include 'connect.php'; 

// echo ("AAAAA");
// die();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id'])) {
        $id = $_POST['id'];

        $id = mysqli_real_escape_string($conn, $id);

        $query = "DELETE FROM produk WHERE id = '$id'";

        if (mysqli_query($conn, $query)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'error' => mysqli_error($conn)]);
        }
    } else {
        echo json_encode(['success' => false, 'error' => 'ID not set']);
    }
}
?>
