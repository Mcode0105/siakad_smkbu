<?php
session_start();
if (!isset($_SESSION['wali_kelas'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_walikelas/header.php';
include_once '../template_walikelas/sidebar.php';
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
        $kelas   = $_GET['kelas'];
        $jurusan = $_GET['jurusan'];
        $tahun   = $_GET['tahun'];
        $hasil   = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = '$kelas' AND jurusan = '$jurusan' AND thn_akademik = '$tahun' ");
        $as      = mysqli_fetch_assoc($hasil);
        $jum     = mysqli_num_rows($hasil);
        ?>
        <div class="box">
            <div class="box-header with-border">
                <p>kelas : <strong> <?= $kelas; ?></strong></p>
                <p>Jurusan : <strong> <?= $jurusan; ?> </strong></p>
                <p>Tahun akdemik : <strong> <?= $tahun ?></strong></p>
                <p>Jumlah Siswa : <strong> <?= $jum ?></strong></p>
                <br>
                <a class="btn btn-success" href="data.php"> <i class="fa fa-arrow-left"> kembali</i> </a>



            </div>
            <div class="box-body">



                <div class="box-body">


                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Foto</th>
                                <th>Nisn</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Tahun Aakdemik</th>
                                <th>Opsi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $kelas   = $_GET['kelas'];
                            $jurusan = $_GET['jurusan'];
                            $tahun   = $_GET['tahun'];
                            $result = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas ='$kelas' AND jurusan ='$jurusan' AND thn_akademik ='$tahun' ");
                            $no = 1;
                            $cek = mysqli_query($conn, "SELECT * FROM rekap_absen");
                            $st = mysqli_fetch_assoc($cek);
                            $nisn = $st['nisn'];
                            while ($row = mysqli_fetch_assoc($result)) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['nama']; ?></td>
                                <td><img style="width: 60px;" src="../admin/img/<?= $row['foto']; ?>" alt=""></td>
                                <td><?= $row['nisn']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td><?= $row['thn_akademik']; ?></td>
                                <td> <a href="detail_absen_ganjil.php?nisn=<?= $row['nisn']; ?>&kelas=<?=$row['kelas'] ?>" class="btn btn-info btn-sm"><i
                                            class="fa fa-eye"> Detail</i></a>
                                    <a href="input_absen.php?id=<?= $row['id']; ?>" class="btn btn-primary btn-sm"><i
                                            class="fa fa-edit"> input </i></a></td>

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
include_once '../template_walikelas/footer.php';
?>