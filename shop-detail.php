

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Ragambakul - Vegetable Website Template</title>
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

        <?php
            include 'connect.php'; 
            session_start();

            if (!isset($_SESSION['idUser'])) {
                header("Location: login.php"); 
                exit();
            }
            if (isset($_GET['id'])) {
                $productId = intval($_GET['id']); 

                $query = "
                    SELECT p.*, u.telepon 
                    FROM produk p 
                    JOIN user u ON p.user_id = u.id 
                    WHERE p.id = $productId
                ";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $productDetail = mysqli_fetch_assoc($result);
            ?>
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Produk Detail</h1>
        </div>
        <!-- Single Page Header End -->

        <!-- Single Product Start -->
        <div class="container-fluid py-5 mt-5">
            <div class="container py-5">
                <div class="row g-4 mb-5">
                    <div class="col-lg-8 col-xl-9">
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border rounded">
                                    <img src="img/<?php echo htmlspecialchars($productDetail['foto']); ?>" class="img-fluid rounded" alt="<?php echo htmlspecialchars($productDetail['nama_produk']); ?>">
                                </div>
                            </div>

                            
                            <div class="col-lg-6">
                                <h4 class="fw-bold mb-3"><?php echo htmlspecialchars($productDetail['nama_produk']); ?></h4>
                                <p class="mb-3">Kategori: <?php echo htmlspecialchars($productDetail['jenis']); ?></p>
                                <h5 class="fw-bold mb-3">Rp.<?php echo htmlspecialchars($productDetail['harga']); ?></h5>
                                <p class="mb-4"><?php echo htmlspecialchars($productDetail['deskripsi_produk']); ?></p>

                                <!-- Tombol untuk beli -->
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addToCartModal" data-id="<?php echo $productDetail['id']; ?>" data-price=<?php echo $productDetail['harga']; ?>>
                                    <i class="fa fa-shopping-cart me-2"></i> Tambahkan ke Keranjang
                                </button>
                            </div>


                            <div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="add_to_cart.php" method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addToCartLabel">Masukkan Jumlah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="product_id" id="product_id">
                                                <input type="hidden" name="price" id="price">
                                                <div class="mb-3">
                                                    <label for="quantity" class="form-label">Jumlah</label>
                                                    <input type="number" name="quantity" id="quantity" class="form-control" min="1" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambahkan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Product End -->
<?php
    } else {
        echo '<p>Detail produk tidak ditemukan.</p>';
    }
} else {
    echo '<p>ID produk tidak valid.</p>';
}
?>


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

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

    <script>
    // Set data ke modal
    const addToCartModal = document.getElementById('addToCartModal');
    addToCartModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const productId = button.getAttribute('data-id');
        const price = button.getAttribute('data-price');
        document.getElementById('product_id').value = productId;
        document.getElementById('price').value = price;
    });
</script>
    </body>

</html>