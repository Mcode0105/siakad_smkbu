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
           
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <!-- Widget: user widget style 1 -->
                        <div class="box box-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <div class="widget-user-header bg-aqua-active">
                                <h3 class="widget-user-username">Abdul Munif</h3>
                                <h5 class="widget-user-desc">1821400160</h5>
                            </div>
                            <div class="widget-user-image">
                                <img class="img-circle" src="../admin/img/logo.jpg" alt="User Avatar">
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
                                            $query = mysqli_query($conn, "SELECT * FROM rekap_absen WHERE nisn = '$nama' ");
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
                                                    $query1 = mysqli_query($conn, "SELECT * FROM rekap_absen WHERE nisn = '$nama' ");
                                                    $jml = mysqli_fetch_assoc($query1)
                                                    ?>
                                                    <th style="text-align: center;" colspan="2">jumlah</th>
                                                    <!-- alfa pagi -->
                                                    <?php if ($jml['jml_alfa_pagi'] < 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_alfa_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span class="badge bg-blue"><?= $jml['jml_alfa_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end alfa pagi -->
                                                        <!-- alfasiang -->
                                                        <?php if ($jml['jml_alfa_siang'] < 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_alfa_siang']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_alfa_siang']; ?></span>
                                                        <?php endif ?>
                                                        <!-- alfasiang -->
                                                        <!-- izin pagi -->
                                                        <?php if ($jml['jml_izin_pagi'] < 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_izin_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span class="badge bg-blue"><?= $jml['jml_izin_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end izin pagi -->
                                                        <!-- izinsiang -->
                                                        <?php if ($jml['jml_izin_siang'] < 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_izin_siang']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_izin_siang']; ?></span>
                                                        <?php endif ?>
                                                        <!-- izinsiang -->
                                                        <!-- sakit pagi -->
                                                        <?php if ($jml['jml_sakit_pagi'] < 50) : ?>
                                                    <th><span class="badge bg-red"><?= $jml['jml_sakit_pagi']; ?></span>
                                                        <?php else : ?>
                                                    <th><span
                                                            class="badge bg-blue"><?= $jml['jml_sakit_pagi']; ?></span>
                                                        <?php endif ?>
                                                        <!-- end sakit pagi -->
                                                        <!-- sakitsiang -->
                                                        <?php if ($jml['jml_sakit_siang'] < 50) : ?>
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
<script>
window.print();
</script>
