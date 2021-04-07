<?php
session_start();
if (!isset($_SESSION['siswa'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_siswa/header.php';
include_once '../template_siswa/sidebar.php';
include_once '../config/function.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data rekap Absensi

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Data rekap absensi</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"></h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <?php
                            $nisn = $_SESSION['siswa'];
                            $res = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nisn' ");
                            $a   = mysqli_fetch_assoc($res);
                            $nisn = $_SESSION['siswa'];
                            $query1 = mysqli_query($conn, "SELECT * FROM rekap_absen_ganjil WHERE nisn = '$nisn' ");
                            $jml = mysqli_fetch_assoc($query1)
                            ?>
                            <div class="widget-user-header bg-aqua-active">
                                <h3 style="font-style: bold;" class="widget-user-username"><?= $a['nama']; ?></h3>
                                <h5 class="widget-user-desc"><?= $a['nisn']; ?></h5>
                                <h5 class="widget-user-desc">Semester <?= $jml['semester'] . " " . $jml['tahun']; ?>
                                </h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="../admin/img/logo.png" alt="User Avatar">
                            </div>
                            <div class="box-footer">
                                <div class="row">
                                    <div class="box-body">
                                        <table class="table table-bordered">
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Bulan / tahun</th>
                                                <th style="text-align: center;" colspan="2">Alfa</th>
                                                <th style="text-align: center;" colspan="2">izin</th>
                                                <th style="text-align: center;" colspan="2">Sakit</th>

                                            </tr>
                                            <tr>
                                                <td style="width: 10px"></td>
                                                <th style="width: 100px"></th>
                                                <th style="width: 40px">Pagi</th>
                                                <th style="width: 40px">siang</th>
                                                <th style="width: 40px">Pagi</th>
                                                <th style="width: 40px">Siang</th>
                                                <th style="width: 40px">Pagi</th>
                                                <th style="width: 40px">Siang</th>


                                            </tr>
                                            <?php
                                            $no = 1;
                                            $nama = $_SESSION['siswa'];
                                            $query = mysqli_query($conn, "SELECT * FROM rekap_absen_ganjil WHERE nisn = '$nama' ");
                                            ?>
                                            <?php while ($as = mysqli_fetch_assoc($query)) : ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $as['bulan'] . " " . $as['tahun'] ?></td>
                                                <td><?= $as['alfapagi']; ?></td>
                                                <td><?= $as['alfasiang']; ?></td>
                                                <td><?= $as['izinpagi']; ?></td>
                                                <td><?= $as['izinsiang']; ?></td>
                                                <td><?= $as['sakitpagi']; ?></td>
                                                <td><?= $as['sakitsiang']; ?></td>
                                                <!-- <td><span class="badge bg-red">55%</span></td> -->
                                            </tr>
                                            <?php
                                                $no++;
                                            endwhile ?>
                                            <tfoot>
                                                <tr>
                                                    <?php
                                                    $nama = $_SESSION['siswa'];
                                                    $id   = $_GET['id'];
                                                    $semester = $_GET['semester'];
                                                    $query1 = mysqli_query($conn, "SELECT * FROM rekap_absen_ganjil WHERE nisn = '$nama' ");
                                                    $jml = mysqli_fetch_assoc($query1)
                                                    ?>
                                                    <th style="text-align: center;" colspan="2">jumlah</th>
                                                    <!-- alfa pagi -->
                                                    <?php if ($jml['jml_alfa_pagi'] > 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_alfa_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span class="badge bg-blue"><?= $jml['jml_alfa_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end alfa pagi -->
                                                        <!-- alfasiang -->
                                                        <?php if ($jml['jml_alfa_siang'] > 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_alfa_siang']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_alfa_siang']; ?></span>
                                                        <?php endif ?>
                                                        <!-- alfasiang -->
                                                        <!-- izin pagi -->
                                                        <?php if ($jml['jml_izin_pagi'] > 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_izin_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span class="badge bg-blue"><?= $jml['jml_izin_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end izin pagi -->
                                                        <!-- izinsiang -->
                                                        <?php if ($jml['jml_izin_siang'] > 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_izin_siang']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_izin_siang']; ?></span>
                                                        <?php endif ?>
                                                        <!-- izinsiang -->
                                                        <!-- sakit pagi -->
                                                        <?php if ($jml['jml_sakit_pagi'] > 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_sakit_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_sakit_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end sakit pagi -->
                                                        <!-- sakitsiang -->
                                                        <?php if ($jml['jml_sakit_siang'] > 50) : ?>
                                                    <th><span
                                                            class="badge bg-red"><?= $jml['jml_sakit_siang']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_sakit_siang']; ?></span>
                                                        <?php endif ?>
                                                        <!-- sakitsiang -->
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <br>
                                        <div style="text-align: center;" class="row">
                                            <a target="_BLANK" href="print_rekapabsen.php?id=<?= $as['id']; ?>"
                                                class="btn btn-success"><i class="fa fa-save"></i><b>
                                                    simpan / print</b></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                </div>




                <!-- end -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <!-- Footer -->
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_siswa/footer.php';
?>