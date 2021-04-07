<?php
if (!isset($_SESSION['wali_kelas'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../config/function.php';
$username = $_SESSION['wali_kelas'];
$res = mysqli_query($conn, "SELECT * FROM wali_kelas WHERE email = '$username' ");
$as = mysqli_fetch_assoc($res);
?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index.php" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>SMK</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>SIAKAD </b>SMKBU</span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li>
                            <a data-toggle="control-sidebar"><i class="fa fa-calendar">
                                    <?= hari() . " , " . date("d m Y") ?></i></a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../admin/img/<?= $as['foto']; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $as['nama']; ?></span>
                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../admin/img/<?= $as['foto']; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        ADMIN - Web Developer
                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="../admin/img/<?= $as['foto']; ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?= $as['nama']; ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->


                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">DHASBOARD MENU</li>
                    <li>
                        <a href="index.php">
                            <i class="fa fa-dashboard"></i> <span>DHASBOARD</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-edit"></i>
                            <span>Data ABSENSI</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="data.php"><i class="fa fa-circle-o"></i>Absensi GENAP</a>
                            </li>
                            <li><a href="data_ganjil.php"><i class="fa fa-circle-o"> Absensi GANJIL</i> </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="ganti_password.php">
                            <i class="fa fa-key"></i> <span>Ganti Password</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="../logout.php">
                            <i class="fa fa-sign-out"></i> <span>Keluar</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

            </section>
            <!-- /.sidebar -->
        </aside>