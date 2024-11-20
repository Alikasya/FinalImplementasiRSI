<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">    
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="img/logo_sayur.png" style="" alt="IMG">
            </div>

            <form class="login100-form validate-form" method="post" action="auth_register.php">
                <span class="login100-form-title">
                    Register
                </span>

                <div class="wrap-input100 validate-input" data-validate="Valid nama is required">
                    <input class="input100" type="text" name="nama" placeholder="Nama" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid alamat is required">
                    <input class="input100" type="text" name="alamat" placeholder="Alamat" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid deskripsi is required">
                    <input class="input100" type="text" name="deskripsi" placeholder="Deskripsi" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid No Telepon is required">
                    <input class="input100" type="text" name="notelp" placeholder="Telepon" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input">
               
                    <label class="radio-inline">
                        <input type="radio" name="jenisKelamin" value="Laki - Laki" required> Laki-Laki
                    </label>

                    <label class="radio-inline p-l-45">
                        <input type="radio" name="jenisKelamin" value="Perempuan" required> Perempuan
                    </label>
                   
                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required">
                    <input class="input100" type="text" name="email" placeholder="Email" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="pass" placeholder="Password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="confpass" placeholder="Confirmasi Password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="container-login100-form-btn">
                    <button type="submit" name="login" class="login100-form-btn">
                        Register
                    </button>
                </div>

                <div class="text-center">
                    <a class="txt2" href="#">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="text-center p-t-12">
                    <?php
                    if (isset($_GET['error'])) {
                        echo "<p style='color: red;'>" . htmlspecialchars($_GET['error']) . "</p>";
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
</div>

    
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <script src="js/main.js"></script>

</body>
</html>
