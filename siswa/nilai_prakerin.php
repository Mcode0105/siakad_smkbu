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
            Data Nilai Prakerin

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">data Nilai Prakerin </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="box">
            <br>
            <br>
            <?php
            if (isset($_GET['hapus'])) {
                echo "<div class='alert alert-success'role='alert'>
           data berhasil di hapus.!
            </div>";
            } elseif (isset($_GET['gagal_hapus'])) {
                echo "<div class='alert alert-danger'role='alert'>
           data gagal di hapus.!
            </div>";
            }

            ?>
            <?php
            if (isset($_POST['simpan'])) {
                if (list_siswa($_POST) > 0) {
                    echo  "<div class='alert alert-success'role='alert'>
                Data Berhasil Ditambahkan ..!
                </div>";
                } else {
                    echo  "<div class='alert alert-danger'role='alert'>
                  Data gagal di tambahkan..!
                </div>";
                }
            }
            ?>


            <div class="row">
                <div class="box-body table-responsive">
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 15px">No</th>
                                    <th style="width: 50px">Nama</th>
                                    <th style="width: 50px">Kelas</th>

                                    <th style="width: 50px">Tempat </th>
                                    <th style="width: 50px">Nilai</th>
                                    <th style="width: 50px">Lama</th>
                                    <th style="width: 50px">Guru Pembimbing</th>


                                    <th style="width: 50px">file</th>

                                    <th style="width: 90px">Opsi </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;

                                $nama = $_SESSION['siswa'];
                                $w = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nama' ");
                                $k = mysqli_fetch_assoc($w);
                                $nama = $k['nama'];
                                $kelas = $k['kelas'];
                                $query1 = mysqli_query($conn, "SELECT * FROM nilai_prakerin WHERE nama = '$nama' AND kelas = '$kelas' ");
                                while ($a = mysqli_fetch_assoc($query1)) :
                                ?>
                                    <tr>
                                        <td> <?= $no; ?></td>
                                        <td> <?= $a['nama']; ?></td>
                                        <td> <?= $a['kelas']; ?></td>
                                        <td> <?= $a['tempat']; ?></td>
                                        <td> <?= $a['nilai']; ?></td>
                                        <td> <?= $a['lama']; ?></td>
                                        <td> <?= $a['guru_pembimbing']; ?></td>

                                        <td><?= $a['file']; ?></td>

                                        <td>

                                            <a href="img/<?= $a['file']; ?>" class="btn btn-info btn-sm"><i class="fa fa-download" download> download</i></a>
                                        </td>
                                    </tr>
                                <?php
                                    $no++;
                                endwhile ?>

                                </tfoot>
                        </table>
                    </div>
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