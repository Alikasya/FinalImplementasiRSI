<?php
session_start(); 

include 'connect.php';

$userId = $_SESSION['idUser']; 
$sql = "SELECT * FROM user WHERE id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
} else {
    echo "User not found.";
}
 

if (!isset($_SESSION['idUser'])) {
    header("Location: login.php"); 
    exit();
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
        <link rel="stylesheet" type="text/css" href="css/main.css">

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
                            <a href="contact.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


  

        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Profil</h1>
           
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
        
            <div class="container py-5" style="width:50%;">

            
            <form method="post" action="edit_profile.php" enctype="multipart/form-data">
            <div style="display: flex; justify-content: center; margin-top: 20px;">
                <div class="avatar rounded-circle bg-white p-3" style="width: 120px; height: 120px; overflow: hidden;">
                    <img src="<?php echo htmlspecialchars($userData['foto']); ?>" class="img-fluid rounded-circle" alt="User Icon" style="width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <!-- Input untuk upload foto -->
            <div class="wrap-input100">
                <input type="file" name="foto" accept="image/*">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                </span>
            </div>

            <!-- Hidden input untuk menyimpan foto lama -->
            <input type="hidden" name="old_foto" value="<?php echo htmlspecialchars($userData['foto']); ?>">

            <div class="wrap-input100 validate-input" data-validate="Valid nama is required">
                <input class="input100" type="text" name="nama" placeholder="Nama" value="<?php echo htmlspecialchars($userData['nama']); ?>" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid alamat is required">
                <input class="input100" type="text" name="alamat" placeholder="Alamat" value="<?php echo htmlspecialchars($userData['alamat']); ?>" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid deskripsi is required">
                <input class="input100" type="text" name="deskripsi" placeholder="Deskripsi" value="<?php echo htmlspecialchars($userData['deskripsi']); ?>" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid No Telepon is required">
                <input class="input100" type="text" name="notelp" placeholder="Telepon" value="<?php echo htmlspecialchars($userData['telepon']); ?>" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                </span>
            </div>

            <div class="wrap-input100 validate-input">
                <label class="radio-inline">
                    <input type="radio" name="jenisKelamin" value="Laki-Laki" <?php echo ($userData['jenis_kelamin'] == 'Laki-Laki') ? 'checked' : ''; ?> required> Laki-Laki
                </label>
                <label class="radio-inline p-l-45">
                    <input type="radio" name="jenisKelamin" value="Perempuan" <?php echo ($userData['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?> required> Perempuan
                </label>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Valid email is required">
                <input class="input100" type="email" name="email" placeholder="Email" value="<?php echo htmlspecialchars($userData['email']); ?>" required>
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
            </div>

            <div class="container-login100-form-btn">
           
                <button type="submit" name="save" class="login100-form-btn">
                    Simpan
                </button>
              
            </div>

            <div class="text-center p-t-12">
                <?php
                if (isset($_GET['error'])) {
                    echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
                }
                ?>
            </div>
        </form>

        <button type="button" class="login100-form-btn mt-4" data-toggle="modal" data-target="#ubahPasswordModal">
                    Ubah Password
                </button>

                <!-- Modal Ubah Password -->
                <div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="ubahPasswordModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="ubah_password.php">
                                    <div class="form-group">
                                        <label for="passwordLama">Password Lama</label>
                                        <input type="password" class="form-control" id="passwordLama" name="passwordLama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="passwordBaru">Password Baru</label>
                                        <input type="password" class="form-control" id="passwordBaru" name="passwordBaru" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="konfirmasiPasswordBaru">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" id="konfirmasiPasswordBaru" name="konfirmasiPasswordBaru" required>
                                    </div>
                                    <div class="text-center p-t-12">
                                        <?php
                                        if (isset($_GET['error'])) {
                                            echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
                                        }
                                        ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="login100-form-btn mt-4" style="background-color: red; color: white;" data-toggle="modal" data-target="#logoutModal">
            Keluar
        </button>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda yakin ingin keluar?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-danger" id="confirmLogout">Ya, Keluar</button>
                    </div>
                </div>
            </div>
        </div>

            </div>
            
        </div>
        

        <!-- Contact End -->


        <!-- Footer Start -->
       
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
    document.getElementById('confirmLogout').addEventListener('click', function() {
        window.location.href = 'logout.php';
    });
</script>



    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>