<?php
session_start();
if (!isset($_SESSION['siswa'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_siswa/header.php';
include_once '../template_siswa/sidebar.php';
include_once '../config/function.php';




?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Data Berkas

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Download</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data download</h3>

            </div>
            <div class="box-body">



                <div class="box-body">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama file</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $result = mysqli_query($conn, "SELECT * FROM siswa");
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama']; ?></td>


                                    <td><img style="width: 60px;" src="img/<?= $row['foto']; ?>" alt=""></td>
                                    <td> <a href="daftar_siswa.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-download"> Download</i></a></td>
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
include_once '../template_siswa/footer.php';
?>