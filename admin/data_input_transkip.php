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
            Data input transkip

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


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form role="form" method="post" action="">
                                <div class="box-body">
                                    <div class="col-xs-12">
                                        <label>Kelas</label>
                                        <select name="kelas" class="form-control">
                                            <?php $query = mysqli_query($conn, "SELECT * FROM kelas"); ?>
                                            <?php while ($k = mysqli_fetch_assoc($query)) : ?>

                                                <option value="<?= $k['kelas']; ?>"><?= $k['kelas']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12">
                                        <label>Jurusan</label>

                                        <select name="jurusan" class="form-control">
                                            <?php $queryj = mysqli_query($conn, "SELECT * FROM jurusan"); ?>
                                            <?php while ($j = mysqli_fetch_assoc($queryj)) : ?>
                                                <option value="<?= $j['jurusan']; ?>"> <?= $j['jurusan']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12">
                                        <label>Tahun Akademik</label>
                                        <select name="tahun_Akademik" class="form-control">
                                            <?php $queryt = mysqli_query($conn, "SELECT * FROM tahun_akademik"); ?>
                                            <?php while ($t = mysqli_fetch_assoc($queryt)) : ?>
                                                <option value="<?= $t['tahun']; ?>"> <?= $t['tahun']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <br>
                                    <br>

                                    <!-- /.box-body -->
                                    <div class="col-xs-3">
                                        <div class="box-footer">
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-success" href="data_input_transkip.php"> <i class="fa fa-refresh"> Refresh</i> </a>
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
                                    <a href="view_transkip.php?jurusan=<?= $a['jurusan']; ?>&kelas=<?= $a['kelas']; ?>&tahun=<?= $a['t_akademik']; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"> Lihat Data Siswa</i></a>

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