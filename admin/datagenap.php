<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_admin/header.php';
include_once '../template_admin/sidebar.php';
include_once '../config/function.php';




?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Daftar list Siswa

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <br>
            <br>
            <!-- Button trigger modal -->

            <a style="margin-left: 13px" class="btn btn-success" href="dataganjil.php"> <i class="fa fa-refresh">
                    Refresh</i> </a>
            <div class="box-body">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Kelas</th>
                                <th> Jurusan </th>
                                <th>tahun akademik </th>
                                <th>Opsi </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($conn, "SELECT * FROM grup_siswa");
                            while ($a = mysqli_fetch_assoc($query)) :
                            ?>
                                <tr>
                                    <td> <?= $no; ?></td>
                                    <td> <?= $a['kelas']; ?></td>
                                    <td> <?= $a['jurusan']; ?> </td>
                                    <td> <?= $a['t_akademik']; ?></td>
                                    <td>
                                        <a href="siswagenap?jurusan=<?= $a['jurusan']; ?>&kelas=<?= $a['kelas']; ?>&tahun=<?= $a['t_akademik']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"> lihat data siswa</i></a>

                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endwhile ?>

                            </tfoot>
                    </table>
                </div>

                <!-- /.box-body -->

            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_admin/footer.php';
?>