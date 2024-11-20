<?php
session_start(); 
include 'connect.php'; 

if (!isset($_SESSION['idUser'])) {
    header('Location: login.php');
    exit; 
}

$query = "SELECT DISTINCT jenis FROM produk";
$result = mysqli_query($conn, $query);

$jenis_produk = [];
while ($row = mysqli_fetch_assoc($result)) {
    $jenis_produk[] = $row['jenis'];
}

$sql_all_products = "SELECT * FROM produk";
$result_all_products = mysqli_query($conn, $sql_all_products);

$all_products = [];

if ($result_all_products) {
    while ($row = mysqli_fetch_assoc($result_all_products)) {
        $all_products[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$sql_latest_products = "SELECT * FROM produk ORDER BY id DESC LIMIT 3"; 
$result_latest_products = mysqli_query($conn, $sql_latest_products);

$latest_products = [];

if ($result_latest_products) {
    while ($row = mysqli_fetch_assoc($result_latest_products)) {
        $latest_products[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

$sql_all_productsDesc = "SELECT * FROM produk ORDER BY id DESC"; 
$result_all_productsDesc = mysqli_query($conn, $sql_all_productsDesc);

$all_productsDesc = [];

if ($result_all_productsDesc) {
    while ($row = mysqli_fetch_assoc($result_all_productsDesc)) {
        $all_productsDesc[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Ragambakul</title>
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




        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                        <h1 class="mb-5 display-3 text-primary">Organic Veggies & Fruits Foods</h1>
                       
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vegetables</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vegetables</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->



        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite py-5">
    <div class="container py-5">
    <div class="position-relative mx-auto">
    <input id="searchInput" class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="text" placeholder="Search">
    <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
</div>
<div class="tab-class text-center">
    <div class="row g-4">
        <div class="col-lg-4 text-start">
            <h1>Produk Terbaru</h1>
        </div>
        
        <div class="col-lg-8 text-end">
            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                <li class="nav-item">
                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                        <span class="text-dark" style="width: 130px;">All Products</span>
                    </a>
                </li>
                <?php foreach ($jenis_produk as $index => $jenis): ?>
                    <li class="nav-item">
                        <a class="d-flex py-2 m-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-<?php echo $index + 2; ?>">
                            <span class="text-dark" style="width: 130px;"><?php echo ($jenis); ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <!-- Tab All Products -->
        <div class="tab-pane fade show active" id="tab-1">
            <div class="row g-4">
                <?php foreach ($all_products as $product): ?>
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="rounded position-relative fruite-item">
                            <div class="fruite-img" style="padding:2px;">
                                <img src="img/<?php echo ($product['foto']); ?>" class="img-fluid w-100 rounded-top" style="height:300px;" alt="">
                            </div>
                            <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo ($product['jenis']); ?></div>
                            <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                <h4><?php echo ($product['nama_produk']); ?></h4>
                                <p><?php echo ($product['deskripsi_produk']); ?></p>
                                <div class="d-flex justify-content-between flex-lg-wrap">
                                    <p class="text-dark fs-5 fw-bold mb-0">Rp <?php echo ($product['harga']); ?> / kg</p>
                                    <a href="shop-detail.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                        <i class="fa fa-shopping-bag me-2 text-primary"></i> Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Tab untuk setiap jenis produk -->
        <?php foreach ($jenis_produk as $index => $jenis): ?>
            <div class="tab-pane fade" id="tab-<?php echo $index + 2; ?>">
                <div class="row g-4">
                    <?php
                    // Ambil produk berdasarkan jenis untuk tab ini
                    $sql = "SELECT * FROM produk WHERE jenis = '$jenis'";
                    $result = mysqli_query($conn, $sql);
                    $products = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $products[] = $row;
                    }

                    foreach ($products as $product): ?>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="rounded position-relative fruite-item">
                                <div class="fruite-img">
                                    <img src="img/<?php echo ($product['foto']); ?>" class="img-fluid w-100 rounded-top" alt="">
                                </div>
                                <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;"><?php echo ($product['jenis']); ?></div>
                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                    <h4><?php echo ($product['nama_produk']); ?></h4>
                                    <p><?php echo ($product['deskripsi_produk']); ?></p>
                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                        <p class="text-dark fs-5 fw-bold mb-0">Rp <?php echo ($product['harga']); ?> / kg</p>
                                        <a href="shop-detail.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary">
                                            <i class="fa fa-shopping-bag me-2 text-primary"></i> Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>      
</div>
</div>
        <!-- Fruits Shop End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            <?php foreach ($latest_products as $product): ?>
                <div class="col-md-6 col-lg-4">
                    <a href="shop-detail.php?id=<?php echo htmlspecialchars($product['id']); ?>">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="img/<?php echo ($product['foto']); ?>" class="img-fluid rounded-top w-100" style="height:400px;" alt="<?php echo ($product['nama_produk']); ?>">
                            <div class="px-4 rounded-bottom">
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h5 class="text-white"><?php echo ($product['nama_produk']); ?></h5>
                                    <h6 class="mb-0"><?php echo ($product['deskripsi_produk']); ?> </h6> 
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        <div class="container-fluid vesitable py-5">
    <div class="container py-5">
        <h1 class="mb-0">Fresh Organic Vegetables</h1>
        <div class="owl-carousel vegetable-carousel justify-content-center">
            <?php foreach ($all_productsDesc as $product): ?>
                <div class="border border-primary rounded position-relative vesitable-item">
                    <div class="vesitable-img">
                        <img src="img/<?php echo htmlspecialchars($product['foto']); ?>" class="img-fluid w-100 rounded-top" style="height:350px;" alt="<?php echo htmlspecialchars($product['nama_produk']); ?>">
                    </div>
                    <div class="text-white bg-primary px-3 py-1 rounded position-absolute" style="top: 10px; right: 10px;">Vegetable</div>
                    <div class="p-4 rounded-bottom">
                        <h4><?php echo htmlspecialchars($product['nama_produk']); ?></h4>
                        <p><?php echo htmlspecialchars($product['deskripsi_produk']); ?></p> 
                        <div class="d-flex justify-content-between flex-lg-wrap">
                            <p class="text-dark fs-5 fw-bold mb-0">$<?php echo htmlspecialchars($product['harga']); ?> / kg</p> 
                            <a href="shop-detail.php?id=<?php echo htmlspecialchars($product['id']); ?>" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-bag me-2 text-primary"></i> Detail</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Exotic</h1>
                            <p class="fw-normal display-3 text-dark mb-4"><?php echo htmlspecialchars($all_productsDesc[0]['nama_produk']); ?></p>
                            <p class="mb-4 text-dark"><?php echo htmlspecialchars($all_productsDesc[0]['deskripsi_produk']); ?></p>
                            <a href="shop-detail.php?id=<?php echo htmlspecialchars($all_productsDesc[0]['id']); ?>" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BELI</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="img/<?php echo htmlspecialchars($all_productsDesc[0]['foto']); ?>" style="height:400px" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0"><?php echo htmlspecialchars($all_productsDesc[0]['harga']); ?></span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


      

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
    document.getElementById('searchInput').addEventListener('input', function() {
        const query = this.value.toLowerCase();
        const tabs = document.querySelectorAll('.tab-pane');

        tabs.forEach(tab => {
            const products = Array.from(tab.querySelectorAll('.fruite-item')); 
            const matchedProducts = []; 
            const unmatchedProducts = []; 
            products.forEach(product => {
                const productName = product.querySelector('h4').textContent.toLowerCase();
                if (productName.includes(query)) {
                    matchedProducts.push(product); 
                } else {
                    unmatchedProducts.push(product); 
                }
            });

            tab.innerHTML = ''; 
            const allProducts = matchedProducts.concat(unmatchedProducts); 

            allProducts.forEach(product => {
                tab.appendChild(product); 
            });

            tab.style.display = matchedProducts.length > 0 ? '' : 'none'; 
        });
    });
</script>


    </body>

</html>