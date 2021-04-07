<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php?ceklogin");
}
include_once "../template_admin/header.php";
include_once "../template_admin/sidebar.php";
include_once "../config/function.php";
$siswa = mysqli_query($conn, "SELECT * FROM siswa");
$jum = mysqli_num_rows($siswa);
$jurusan = mysqli_query($conn, "SELECT * FROM jurusan");
$jumj = mysqli_num_rows($jurusan);
$kelas = mysqli_query($conn, "SELECT * FROM kelas");
$jumk = mysqli_num_rows($kelas);
$guru = mysqli_query($conn, "SELECT * FROM guru");
$jumg = mysqli_num_rows($guru);
$walikelas = mysqli_query($conn, "SELECT * FROM wali_kelas");
$wk = mysqli_num_rows($walikelas);
$strl = mysqli_query($conn, "SELECT * FROM struktural");
$str = mysqli_num_rows($strl);

$xa = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'X TKJ A' ");
$kelasxa = mysqli_num_rows($xa);
$xb = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'X TKJ B' ");
$kelasxb = mysqli_num_rows($xb);
$xc = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'X TKJ C' ");
$kelasxc = mysqli_num_rows($xc);
$xd = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'X TKJ D' ");
$kelasxd = mysqli_num_rows($xc);
$xia = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'XI TKJ A' ");
$kelasxia = mysqli_num_rows($xia);
$xib = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'XI TKJ B' ");
$kelasxib = mysqli_num_rows($xib);
$xiia = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'XII TKJ A' ");
$kelasxiia = mysqli_num_rows($xiia);
$xiib = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'XII TKJ B' ");
$kelasxiib = mysqli_num_rows($xiib);
$xiic = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = 'XII TKJ C' ");
$kelasxiic = mysqli_num_rows($xiic);

$siswalk = mysqli_query($conn, "SELECT * FROM siswa WHERE jk = 'Laki laki' ");
$lk = mysqli_num_rows($siswalk);
$siswapr = mysqli_query($conn, "SELECT * FROM siswa WHERE jk = 'Perempuan' ");
$pr = mysqli_num_rows($siswapr);

?>



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="callout callout-success">
            <h4>ASSALAMUALAIKUM. SELAMAT <?= waktu(); ?>, <?= $_SESSION['admin']; ?> </h4>

            <p>Apa Kabar Hari Ini..? Semoga Selalu Berada di Lindungan Allah SWT</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3><?= $jumg; ?></h3>

                        <p>Data Guru</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="guru.php" class="small-box-footer">Lihat Data <i class="fa fa--circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3><?= $jum; ?><sup style="font-size: 20px"></sup></h3>

                        <p>Data Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user"></i>
                    </div>
                    <a href="siswa.php" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3><?= $jumk; ?></h3>

                        <p>Data Kelas</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-book"></i>
                    </div>
                    <a href="kelas.php" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3><?= $jumj; ?></h3>

                        <p>Data Jurusan</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                    <a href="jurusan.php" class="small-box-footer">Lihat Data <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h1 style="text-align: center; color: blue; font-family:Verdana;">Data Grafik</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md 5">
                <!-- DONUT CHART -->
                <!-- /.col (LEFT) -->

                <div class="col-md-5">
                    <!-- LINE CHART -->
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Guru', <?= $jumg; ?>],
                                ['Wali Kelas', <?= $wk; ?>],
                                ['Struktural', <?= $str; ?>]
                            ]);

                            var options = {
                                title: 'Data Grafik (guru,walikelas,struktural) ',
                                width: '100%',
                                height: '700%',
                                is3D: true,
                            };
                            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                            chart.draw(data, options);
                        }
                    </script>
                    <style>
                        #chart_wrap {
                            position: relative;
                            padding-bottom: 100%;
                            height: 0;
                            overflow: hidden;
                        }

                        #piechart_3d {
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 700px;
                        }
                    </style>
                    </head>

                    <body>
                        <div id="chart_wrap">
                            <div id="piechart_3d"></div>
                        </div>
                    </body>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="col-md-5">
                        <!-- LINE CHART -->
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script type="text/javascript">
                            google.charts.load("current", {
                                packages: ["corechart"]
                            });
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ['Task', 'Hours per Day'],
                                    ['Kelas X A', <?= $kelasxa; ?>],
                                    ['Kelas X B', <?= $kelasxb; ?>],
                                    ['Kelas X C', <?= $kelasxc; ?>],
                                    ['Kelas X D', <?= $kelasxd; ?>],
                                    ['Kelas XI A', <?= $kelasxia; ?>],
                                    ['Kelas XI B', <?= $kelasxib; ?>],
                                    ['Kelas XII A', <?= $kelasxiia; ?>],
                                    ['Kelas XII B', <?= $kelasxiib; ?>],
                                    ['Kelas XII C', <?= $kelasxiic; ?>]
                                ]);

                                var options = {
                                    title: 'Data Grafik (guru,walikelas,struktural) ',
                                    width: '100%',
                                    height: '500%',
                                    is3D: true,
                                };
                                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
                                chart.draw(data, options);
                            }
                        </script>
                        <style>
                            #chart_wrap {
                                position: relative;
                                padding-bottom: 100%;
                                height: 0;
                                overflow: hidden;
                            }

                            #piechart_3d {
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 500px;
                            }
                        </style>
                        </head>

                        <body>
                            <div id="chart_wrap1">
                                <div id="piechart_3d1" style="width: 700px; height: 500px;"></div>
                            </div>
                        </body>
                    </div>
                </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include_once "../template_admin/footer.php";

?>