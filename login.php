<?php
session_start();
include_once 'config/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login | SIAKAD</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="asset_login/images/icons/logo.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="asset_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="asset_login/css/main.css">
    <link rel="stylesheet" type="text/css" href="asset_login/dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('asset_login/images/bg.jpg');">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-20">
                    <img src="asset_login/images/icons/logo.png" height="120px" width="120px" alt="">
                </span>
                <span class="login100-form-title p-b-20">
                    Halaman Login
                </span>
                <?php
                if (isset($_GET['ceklogin'])) {
                    echo  "<div class='alert alert-danger'role='alert'>
                        anda harus login terlebih dahulu
                            </div>";
                }
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($conn, $_POST['username']);
                    $password = mysqli_real_escape_string($conn, $_POST['password']);
                    if ($username === "" || $password === "") {
                        echo  "<div class='alert alert-danger'role='alert'>
                            username dan password tidak boleh kosong.! klik untuk login kembali <a href='login'>login</a>
                            </div>";
                        return false;
                    }
                    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
                    $cekadmin = mysqli_num_rows($result);
                    $ad = mysqli_fetch_assoc($result);

                    $siswa  = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$username' AND password = '$password' ");
                    $ceksiswa = mysqli_num_rows($siswa);
                    $wali_kelas  = mysqli_query($conn, "SELECT * FROM wali_kelas WHERE email = '$username' AND password = '$password' ");
                    $cekwalikelas = mysqli_num_rows($wali_kelas);
                    $cekguru  = mysqli_query($conn, "SELECT * FROM guru WHERE email = '$username' AND password = '$password' ");
                    $guru = mysqli_num_rows($cekguru);
                    $w = waktu();
                    if ($cekadmin > 0) {
                        $_SESSION['admin'] = $username;
                        echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({
                                    icon: 'success',
                                    title: 'selamat $w, Alhamdulillah Anda Berhasil Login Sebagai Admin',
                                    text:  ' Klik OK untuk Melanjutkan',
                                    type: 'success',
                                    showConfirmButton: true
                                });   
                        },10);  
                        window.setTimeout(function(){ 
                            window.location.replace('admin/');
                        } ,3000); 
                        </script>";
                    } elseif ($ceksiswa > 0) {
                        $_SESSION['siswa'] = $username;
                        echo "<script type='text/javascript'>
                        setTimeout(function () { 
                            swal({
                                    icon: 'success',
                                    title: 'selamat $w, Alhamdulillah Anda Berhasil Login Sebagai Siswa',
                                    text:  ' Klik OK untuk Melanjutkan',
                                    type: 'success',
                                    showConfirmButton: true
                                });   
                        },10);  
                        window.setTimeout(function(){ 
                            window.location.replace('siswa/');
                        } ,3000); 
                        </script>";
                    } elseif ($cekwalikelas > 0) {
                        $_SESSION['wali_kelas'] = $username;
                        echo "<script type='text/javascript'>
                            setTimeout(function () { 
                                swal({
                                        icon: 'success',
                                        title: 'selamat $w, Alhamdulillah Anda Berhasil Login Sebagai Wali Kelas',
                                        text:  ' Klik OK untuk Melanjutkan',
                                        type: 'success',
                                        showConfirmButton: true
                                    });   
                            },10);  
                            window.setTimeout(function(){ 
                                window.location.replace('walikelas/');
                            } ,3000); 
                            </script>";
                    } elseif ($guru > 0) {
                        $_SESSION['guru'] = $username;
                        echo "<script type='text/javascript'>
                            setTimeout(function () { 
                                swal({
                                        icon: 'success',
                                        title: 'selamat $w, Alhamdulillah Anda Berhasil Login Sebagai Guru',
                                        text:  'Klik OK untuk Melanjutkan',
                                        type: 'success',
                                        showConfirmButton: true
                                    });   
                            },10);  
                            window.setTimeout(function(){ 
                                window.location.replace('guru/');
                            } ,3000); 
                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                            setTimeout(function () { 
                                swal({
                                        icon: 'error',
                                        title: 'Yahh, mohon maaf kyaknya username  dan password anda salah',
                                        text:  'silahkan coba kembali dengan benar ya..!!',
                                        type: 'error',
                                        showConfirmButton: true
                                    });   
                            },10);  
                            </script>";
                    }
                }

                ?>
                </span>
                <form method="post" action="" class="login100-form validate-form p-b-33 p-t-1">
                    <div class="wrap-input100 validate-input" data-validate="Enter username">
                        <input class="input100" type="text" name="username" placeholder="User name">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button type="submit" name="login" class="login100-form-btn">
                            Login
                        </button>
                    </div>
                </form>
                <br>
                <p style="text-align: center; color:cornsilk; ">SIAKAD (sistem informasi akademik sekolah) </p>
                <p style="text-align: center; color:cornsilk; ">SMK Full Day Bustanul Ulum Bulugading </p>
                <p style="text-align: center; color:lime; ">&copy; Copyright <a style="color: yellow;" href="munifabdillah.epizy.com">ABDUL MUNIF</a> <?= date("Y"); ?> </p>
            </div>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="asset_login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="asset_login/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="asset_login/vendor/bootstrap/js/popper.js"></script>
    <script src="asset_login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="asset_login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="asset_login/vendor/daterangepicker/moment.min.js"></script>
    <script src="asset_login/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="asset_login/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/sweetalert.min.js"></script>

    <script type="text/javascript">
        function hanyaHuruf(evt) {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && charCode > 32)
                return false;
            return true;
        }
    </script>

</body>

</html>