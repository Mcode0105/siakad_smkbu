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
            Siswa SMK Full Day Bustanul Ulum Bulugading

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php

        $hasil   = mysqli_query($conn, "SELECT * FROM siswa  ");
        $as      = mysqli_fetch_assoc($hasil);
        $jum     = mysqli_num_rows($hasil);
        ?>
        <div class="box">
            <div class="box-header with-border">
                <p>Jumlah total Siswa baru : <strong> <?= $jum ?></strong></p>
                <br>
                <a class="btn btn-success" href="siswa.php"> <i class="fa fa-arrow-left"> kembali</i> </a>

                <a class="btn btn-info" href="siswabaru.php"> <i class="fa fa-refresh"> refresh</i> </a>
                <br>
                <br>
                <?php
                if (isset($_GET['cek'])) {
                    echo "<div class='alert alert-success'role='alert'>
           data berhasil di hapus.!
            </div>";
                }
                ?>


            </div>
            <div class="box-body">



                <div class="box-body table-responsive">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>nik</th>
                                <th>Nisn</th>
                                <th>asal sekolah</th>
                                <th>no hp</th>
                                <th>kelas</th>
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
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['nisn']; ?></td>
                                    <td><?= $row['asal_sekolah']; ?></td>
                                    <td><?= $row['hp']; ?></td>
                                    <td><?= $row['kelas']; ?></td>
                                    <td> <a href="daftar_siswa.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Detail</i></a>
                                        <a href="edit_siswa.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"> Edit</i></a>
                                        <a href="hapus_siswa.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> Hapus</i></a></td>
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