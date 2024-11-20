<?php
require_once 'connect.php';
require_once 'Carts.php';

$cart = new Carts($conn);
session_start();
$userId = $_SESSION['idUser'] ?? 1;
$cartItems = $cart->getCartItems($userId);

$cartSummary = $cart->getCartSummary($userId);
$cartTotal = $cart->getCartTotal($userId);
$productOwners = $cart->getProductOwners($userId);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                  
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">Ragambakul</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            
                        </div>
                        <div class="d-flex m-3 me-0">
                          
                          <a href="produk.php" class="position-relative me-4 my-auto">
                              <i class="fa fa-shopping-bag fa-2x"></i>
                            
                          </a>
                          <a href="keranjangCart.php" class="position-relative me-4 my-auto">
                            <i class="fa fa-shopping-cart fa-2x"></i>
                            </a>

                          <a href="contact.php" class="my-auto">
                              <i class="fas fa-user fa-2x"></i>
                          </a>
                      </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Cart Page Start -->
        <div class="container py-5">
        <h1 class="text-center mb-4">Shopping Cart</h1>
        <div class="table-responsive">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($cartItems)): ?>
                      <?php foreach ($cartItems as $item): ?>
                          <tr>
                              <td>
                                  <img src="img/<?= htmlspecialchars($item['foto']); ?>" alt="Produk" style="width: 80px; height: 80px;" class="img-thumbnail">
                              </td>
                              <td><?= htmlspecialchars($item['nama_produk']); ?></td>
                              <td>Rp <?= number_format($item['harga'], 0, ',', '.'); ?></td>
                              <td><?= $item['qty']; ?></td>
                              <td>Rp <?= number_format($item['total_harga'], 0, ',', '.'); ?></td>
                              <td>
                                    <form action="deleteCart.php" method="POST" style="display: inline;">
                                        <input type="hidden" name="cart_id" value="<?= $item['cart_id']; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                          </tr>
                      <?php endforeach; ?>
                  <?php else: ?>
                      <tr>
                          <td colspan="6" class="text-center">Keranjang kosong</td>
                      </tr>
                  <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="row g-4 justify-content-end">
    <div class="col-8"></div>
    <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
    <div class="bg-light rounded">
    <div class="p-4">
        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>

        <?php 
        if ($cartSummary->num_rows > 0): 
        ?>
            <?php while ($item = $cartSummary->fetch_assoc()): ?>
                <div class="d-flex justify-content-between mb-4">
                    <span><?php echo htmlspecialchars($item['nama_produk']); ?> (x<?php echo $item['qty']; ?>)</span>
                    <span>Rp<?php echo number_format($item['subtotal'], 0, ',', '.'); ?></span>
                </div>
            <?php endwhile; ?>
            <div class="d-flex justify-content-between mb-4">
                <h5 class="mb-0 me-4">Subtotal:</h5>
                <p class="mb-0">Rp<?php echo number_format($cartTotal['total'], 0, ',', '.'); ?></p>
            </div>

            <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                <h5 class="mb-0 ps-4 me-4">Total Barang:</h5>
                <p class="mb-0 pe-4"><?php echo $cartTotal['total_qty']; ?></p>
            </div>

        <?php else: ?>
            <div class="alert alert-warning" role="alert">
                Belum ada barang di keranjang.
            </div>
        <?php endif; ?>

        <form method="POST" action="checkout.php">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" 
                    type="submit" name="checkoutBtn">Proceed Checkout</button>
        </form>
    </div>
</div>

    </div>

</div>
    </div>

   
    
        <!-- Cart Page End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Ragambakul  </h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                       
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-9 col-md-12">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Ragambakul?</h4>
                            <p class="mb-4">Marketplace Ragambakul menghubungkan Anda langsung dengan petani lokal untuk sayuran berkualitas tinggi dan bebas bahan kimia. Dengan berbagai pilihan sayuran, layanan transaksi mudah, dan pengiriman cepat, kami menjadikan belanja sehat lebih praktis sambil mendukung petani lokal.</p>
                         
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="">About Us</a>
                            <a class="btn-link" href="">Contact Us</a>
                            <a class="btn-link" href="">Privacy Policy</a>
                            <a class="btn-link" href="">Terms & Condition</a>
                            <a class="btn-link" href="">Return Policy</a>
                            <a class="btn-link" href="">FAQs & Help</a>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>

        <div class="modal fade" id="waModal" tabindex="-1" aria-labelledby="waModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="waModalLabel">Pilih Kontak WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Kontak WhatsApp akan muncul di sini -->
                <ul id="waContacts"></ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="proceedWithWa">Proses Pembelian</button>
            </div>
        </div>
    </div>
</div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Ragambakul</a>, penghubung petani dan pembeli.</span>
                    </div>
                   
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
document.getElementById('checkoutBtn').addEventListener('click', function() {
    let productIds = [];
    document.querySelectorAll('.product-id').forEach(function(el) {
        productIds.push(el.getAttribute('data-product-id'));
    });

    let userId = <?php echo $_SESSION['idUser']; ?>;
    fetch('getUserPhone.php', {
        method: 'POST',
        body: JSON.stringify({ user_id: userId, product_ids: productIds }),
        headers: {
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            let phoneNumber = data.phone;  
            fetch('deleteCart.php', {
                method: 'POST',
                body: JSON.stringify({ user_id: userId }),
                headers: {
                    'Content-Type': 'application/json',
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = `https://wa.me/${phoneNumber}`;
                } else {
                    alert('Terjadi kesalahan saat menghapus cart!');
                }
            });
        } else {
            alert('Nomor telepon tidak ditemukan!');
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>

    <!-- Template Javascript -->
   
    <script src="js/main.js"></script>
    </body>

</html>