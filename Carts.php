<?php
class Carts {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getCartItems($userId) {
        $query = "SELECT c.qty, c.harga AS total_harga, c.id AS cart_id,
                         p.nama_produk, p.harga, p.foto
                  FROM cart c
                  JOIN produk p ON c.produk_id = p.id
                  WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCartSummary($idUser) {
        $query = "SELECT p.nama_produk, c.qty, (p.harga * c.qty) AS subtotal, u.nama AS nama_user 
                  FROM cart c
                  JOIN produk p ON c.produk_id = p.id
                  JOIN user u ON c.user_id = u.id
                  WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        return $stmt->get_result();
    }
    

    public function getCartTotal($idUser) {
        $query = "SELECT SUM(c.harga ) AS total, SUM(c.qty) AS total_qty 
                  FROM cart c
                  JOIN produk p ON c.produk_id = p.id
                  WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }
    


    public function addToCart($userId, $productId, $quantity, $price)
    {
        $totalPrice = $quantity * $price;

        $stmt = $this->conn->prepare("INSERT INTO cart (user_id, produk_id, qty, harga) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiid", $userId, $productId, $quantity, $totalPrice);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }




    public function getProductOwners($idUser) {
        $query = "SELECT DISTINCT p.user_id 
                  FROM cart c
                  JOIN produk p ON c.produk_id = p.id
                  WHERE c.user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function clearCart($idUser) {
        $query = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        return $stmt->execute();
    }

    public function deleteCart($idUser) {
        $query = "DELETE FROM cart WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $idUser);
        return $stmt->execute();
    }
    public function processCheckout($userId) {
        $cartItems = $this->getCartItems($userId);

        $query = "SELECT u.telepon 
                  FROM user u 
                  WHERE u.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $phoneNumber = $user['telepon'];
        $this->clearCart($userId);
        $this->redirectToWhatsApp($phoneNumber);
    }

    private function redirectToWhatsApp($phoneNumber) {
        $waUrl = "https://wa.me/6287813582046?text=Hai%20saya%20ingin%20melakukan%20pembelian!";
        header("Location: " . $waUrl);
        exit;
    }

}
?>
