<?php
session_start(); 
include 'connect.php'; 
if (!isset($_SESSION['idUser'])) {
   
    header('Location: login.php');
    exit; 
}
?>

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

        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Produk</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
               
                <li class="breadcrumb-item active text-white">Anda</li>
            </ol>
        </div>
        <!-- Single Page Header End -->

   
        <!-- Cart Page Start -->
        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="table-responsive">
                <div class="mt-5 text-end">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button"  data-bs-toggle="modal" data-bs-target="#addProductModal">Tambah Produk</button>

                <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="add_produk.php" method="POST" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addProductModalLabel">Tambah Produk</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-start">
                                    <div class="mb-3">
                                        <label for="nama_produk" class="form-label text-start" >Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="deskripsi_produk" class="form-label text-start">Deskripsi Produk</label>
                                        <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="harga" class="form-label text-start">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="qty" class="form-label text-start">Quantity</label>
                                        <input type="number" class="form-control" id="qty" name="qty" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenis" class="form-label text-start">Jenis</label>
                                        <input type="text" class="form-control" id="jenis" name="jenis" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto" class="form-label text-start">Foto Produk</label>
                                        <input type="file" class="form-control" id="foto" name="foto" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan Produk</button>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>

</div>
<div class="table-responsive" style="overflow-x: auto;">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Products</th>
                <th scope="col">Nama</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'connect.php';


            $query = "SELECT * FROM produk";
            $result = mysqli_query($conn, $query);

       
            if (mysqli_num_rows($result) > 0):
                while ($row = mysqli_fetch_assoc($result)):
            ?>
                    <tr>
                        <th scope="row">
                            <div class="d-flex align-items-center">
                                <img src="img/<?php echo ($row['foto']) ?>" class="img-fluid me-5 " style="width: 80px; height: 80px;" alt="">
                            </div>
                        </th>
                        <td><p class="mb-0 mt-4"><?php echo  ($row['nama_produk']) ?></p></td>
                        <td><p class="mb-0 mt-4">Rp.<?php echo ($row['harga']) ?> </p></td>
                        <td><p class="mb-0 mt-4"><?php echo ($row['qty']) ?></p></td> 
                        <td><p class="mb-0 mt-4"><?php echo ($row['deskripsi_produk']) ?></p></td>
                        <td>
                        <button class="btn btn-md rounded-circle bg-light border mt-4 me-2"
                                data-bs-toggle="modal" data-bs-target="#editProductModal"
                                data-id=<?php echo  ($row['id']) ?>>
                            <i class="fa fa-edit text-primary"></i>
                        </button>


                            <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="edit_produk.php" method="POST" enctype="multipart/form-data">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editProductModalLabel">Tambah Produk</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                            <input type="hidden" id="product_id" name="product_id">
                                            <input type="hidden" id="id" name="id" value="<?php echo  ($row['id']) ?>">

                                                <div class="mb-3">
                                                    <label for="nama_produk" class="form-label text-start" >Nama Produk</label>
                                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="deskripsi_produk" class="form-label text-start">Deskripsi Produk</label>
                                                    <textarea class="form-control" id="deskripsi_produk" name="deskripsi_produk" rows="3" required></textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="harga" class="form-label text-start">Harga</label>
                                                    <input type="number" class="form-control" id="harga" name="harga" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="qty" class="form-label text-start">Quantity</label>
                                                    <input type="number" class="form-control" id="qty" name="qty" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="jenis" class="form-label text-start">Jenis</label>
                                                    <input type="text" class="form-control" id="jenis" name="jenis" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="foto" class="form-label text-start">Foto Produk (Opsional)</label>
                                                    <input type="file" class="form-control" id="foto" name="foto">
                                                    <img id="current_foto" src="<?php echo ($row['foto']) ? 'img/' .  $row['foto'] : 'img/default.png'; ?>" alt="Foto Produk" width="100" class="mt-2">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-md rounded-circle bg-light border mt-4" data-bs-toggle="modal" data-bs-target="#deleteProductModal" data-id="<?php echo $row['id']; ?>">
                                <i class="fa fa-trash text-danger"></i>
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteProductModal" tabindex="-1" aria-labelledby="deleteProductModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteProductModalLabel">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Apakah Anda yakin ingin menghapus produk ini? Tindakan ini tidak dapat dibatalkan.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="button" class="btn btn-danger" id="confirmDeleteButton">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
            <?php
                endwhile;
            else:
            ?>
                <tr>
                    <td colspan="6" class="text-center">Tidak ada produk yang tersedia</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $('#editProductModal').on('show.bs.modal', function (event) {
    const button = $(event.relatedTarget);
    const productId = button.data('id');

    $.ajax({
        url: 'get_produk.php',
        type: 'GET',
        data: { id: productId },
        success: function (data) {
            const product = JSON.parse(data);

            $('#editProductModal #nama_produk').val(product.nama_produk);
            $('#editProductModal #deskripsi_produk').val(product.deskripsi_produk);
            $('#editProductModal #harga').val(product.harga);
            $('#editProductModal #qty').val(product.qty);
            $('#editProductModal #jenis').val(product.jenis);
            $('#editProductModal #product_id').val(product.id);

       
            $('#editProductModal #foto_lama').val(product.foto);
            $('#editProductModal #current_foto').attr('src', 'img/' + product.foto);
        },
        error: function () {
            alert('Gagal mengambil data produk.');
        }
    });
});



</script>

<script>
    let deleteProductId = null;

    document.querySelectorAll('.btn[data-bs-toggle="modal"]').forEach(button => {
        button.addEventListener('click', function () {
            deleteProductId = this.getAttribute('data-id');
        });
    });


    document.getElementById('confirmDeleteButton').addEventListener('click', function () {
        if (deleteProductId) {
            const formData = new FormData();
            formData.append('id', deleteProductId);
            formData.append('action', 'delete'); 

            fetch('delete_produk.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Network response was not ok.');
                }
            })
            .then(data => {
                if (data.success) {
                    location.reload(); 
                } else {
                    alert('Gagal menghapus produk. Silakan coba lagi.');
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
            });
        }
    });
</script>

    </body>

</html>