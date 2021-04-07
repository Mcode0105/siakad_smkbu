<?php 
session_start();
include_once 'config/function.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="dist/img/logo.jpg" type="image/ico"/>
  <title>Login | SMK BU</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>SIAKAD</b>SMKBU</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Halaman Login</p>
      <?php
      
      if (isset($_GET['ceklogin'])) {
          echo  "<div class='alert alert-danger'role='alert'>
           anda harus login terlebih dahulu
            </div>";
      }
      if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
          if ($username === "" || $password === "") {
             echo  "<div class='alert alert-danger'role='alert'>
            username dan password tidak boleh kosong.! klik untuk login kembali <a href='login.php'>login</a>
            </div>";
            return false;
          }
          $result = mysqli_query($conn,"SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");
          $cekadmin = mysqli_num_rows($result);
          if ($cekadmin > 0 ) {
            $_SESSION['admin'] = $username;
            header("Location: admin/");
          }else{
             echo  "<div class='alert alert-danger'role='alert'>
            maaf..! username atau pasword.
            </div>";
          }
      }
      
      ?>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="text" name = "username" class="form-control"  placeholder="Username" require="" >
        <span class="fa fa-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name ="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input  type="checkbox"> Ingatkan saya
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name ="login" class="btn btn-primary btn-block btn-flat">Login</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!-- /.social-auth-links -->
    <a href="register.html" class="text-center">Daftar Akun Baru</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
