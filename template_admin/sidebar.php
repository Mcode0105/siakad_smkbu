<?php
if (!isset($_SESSION['admin'])) {
    header("Location: ../login?ceklogin");
}
include_once '../config/function.php';
$username = $_SESSION['admin'];
$res = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' ");
$as = mysqli_fetch_assoc($res);
?>

<body class="hold-transition skin-blue fixed sidebar-mini">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="index" class="logo">
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
                            <?php date_default_timezone_set("Asia/Jakarta"); ?>
                            <a data-toggle="control-sidebar"><i class="fa fa-calendar">
                                    <?= hari() . " , " . bulan() . " " . date("d Y, h:i") ?></i></a>
                        </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="../admin/img/<?= $as['foto']; ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?= $_SESSION['admin']; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="../admin/img/<?= $as['foto']; ?>" class="img-circle" alt="User Image">

                                    <p>
                                        ADMINSTRATOR

                                    </p>
                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="administrator" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

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
                        <p><?= $_SESSION['admin']; ?></p>
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
                            <i class="fa fa-group"></i>
                            <span>Data Pengguna</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="guru"><i class="fa fa-circle-o"></i> Guru</a></li>
                            <li><a href="siswa"><i class="fa fa-circle-o"></i> Siswa</a></li>
                            <li><a href="walikelas"><i class="fa fa-circle-o"></i> Wali Kelas </a></li>
                            <li><a href="struktural"><i class="fa fa-circle-o"></i> Struktural </a></li>

                            <li><a href="kepala_sekolah"><i class="fa fa-circle-o"></i> Kepala sekolah </a></li>
                            <li><a href="administrator"><i class="fa fa-circle-o"></i> Adminstrator </a></li>


                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i>
                            <span>Arsip Sekolah</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="surat_masuk"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
                            <li><a href="surat_keluar"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
                            <li><a href="arsip"><i class="fa fa-circle-o"></i> Arsip</a></li>
                            <li><a href="surat_keterangan"><i class="fa fa-circle-o"></i> Surat keterangan</a></li>

                            <!-- <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Surat Keterangan</a></li> -->
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-university"></i>
                            <span>Data Sekolah</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
                            <li><a href="jurusan"><i class="fa fa-circle-o"></i> Data Jurusan</a></li>
                            <li><a href="akademik"><i class="fa fa-circle-o"></i> Tahun Akademik</a></li>
                            <li><a href="mapel"><i class="fa fa-circle-o"></i> Mata Pelajaran</a></li>

                            <li><a href="profil_sekolah"><i class="fa fa-circle-o"></i> profil Sekolah</a></li>
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
                            <i class="fa fa-pencil-square-o"></i>
                            <span>Data Absensi Siswa</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="datagenap"><i class="fa fa-circle-o"></i> Rekap Absensi GENAP</a>
                            </li>
                            <li><a href="dataganjil"><i class="fa fa-circle-o"></i> Rekap Absensi GANJIL</a>
                            </li>
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
                    <li>
                        <a href="pelanggaran_siswa">
                            <i class="fa fa-user-times"></i> <span>Rekam jejak siswa</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="detail_profil_sekolah">
                            <i class="fa fa-mortar-board"></i> <span>Profil Sekolah</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="siswabaru">
                            <i class="fa fa-user-plus"></i> <span>Data Siswa Baru</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="perkembangan_siswa">
                            <i class="fa fa-area-chart"></i> <span>Data perkembangan siswa</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="peserta_didik">
                            <i class="fa fa-group"></i> <span>Data Peserta Didik</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
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