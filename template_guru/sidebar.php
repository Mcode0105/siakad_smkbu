<?php
if (!isset($_SESSION['guru'])) {
    header("Location: ../login?ceklogin");
}
include_once '../config/function.php';
$username = $_SESSION['guru'];
$res = mysqli_query($conn, "SELECT * FROM guru WHERE email = '$username' ");
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
                                        <a href="biodata" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout" class="btn btn-default btn-flat">Sign out</a>
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
                        <a href="index">
                            <i class="fa fa-dashboard"></i> <span>DHASBOARD</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-user"></i>
                            <span>Biodata</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="lengkapi_biodata"><i class="fa fa-circle-o"></i> Lengkapi Biodata </a></li>
                            <li><a href="biodata"><i class="fa fa-circle-o"></i>biodata </a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pencil-square-o"></i>
                            <span>Data Keaktifan</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="d_keaktifan_struktural"><i class="fa fa-circle-o"></i> Struktural</a>
                            </li>
                            <li><a href="data_mengajar"><i class="fa fa-circle-o"></i> Mengajar</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-book"></i>
                            <span>Data Nilai</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li><a href="data_input_transkip"><i class="fa fa-circle-o"></i> Transkip Nilai</a></li>
                            <li><a href="nilai_prakerin"><i class="fa fa-circle-o"></i> Nilai Prakerin</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-calendar"></i>
                            <span>Informasi Akademik</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="kalender"><i class="fa fa-circle-o"></i>Kalender Pendidikan</a>
                            </li>
                            <li><a href="jadwal"><i class="fa fa-circle-o"></i>Jadwal</a>
                            </li>
                            <li><a href="kriteria_ketuntasan"><i class="fa fa-circle-o"></i>Kriteria Ketuntasan Belajar</a>
                            </li>
                            <li><a href="laporan_keuangan"><i class="fa fa-circle-o"></i>Laporan Keuangan</a>
                            </li>
                            <li><a href="data_sarpas"><i class="fa fa-circle-o"></i>Data Sarpas</a>
                            </li>
                            <li><a href="jadwal_lab"><i class="fa fa-circle-o"></i>Jadwal Pengunaan lab</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="ganti_password">
                            <i class="fa fa-key"></i> <span>Ganti Password</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

                    <li>
                        <a href="../logout">
                            <i class="fa fa-sign-out"></i> <span>Keluar</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>

            </section>
            <!-- /.sidebar -->
        </aside>