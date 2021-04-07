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
            Data perkembangan peserta didik baru dan lulusan

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Data perkembangan peserta didik baru dan lulusan</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="box">
            <br>
            <br>
            <?php
            if (isset($_GET['cek'])) {
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
                if (perkembangan_siswa($_POST) > 0) {
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

            <!-- Button trigger modal -->
            <button style="margin-left: 15px;" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"> tambah data</i>
            </button>

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
                            <form role="form" method="post" action="" enctype="multipart/form-data">
                                <div class="box-body">
                                    <div class="col-xs-12">
                                        <label>Tahun Akademik</label>
                                        <select name="tahun" class="form-control">
                                            <?php for ($i = 2015; $i < 2030; $i++) : ?>
                                                <option><?= $i; ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">siswa baru </label>
                                        <input class="form-control" name="siswa" type="text" id="exampleInputFile" placeholder="jumlah siswa baru">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">Lulus </label>
                                        <input class="form-control" name="lulus" type="text" id="exampleInputFile" placeholder="lulus">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">Melanjtkan ke PT </label>
                                        <input class="form-control" name="lanjut" type="text" id="exampleInputFile" placeholder="melanjutkan ke">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">Bekerja </label>
                                        <input class="form-control" name="bekerja" type="text" id="exampleInputFile" placeholder="Bekerja">
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">Tidak Bekerja </label>
                                        <input class="form-control" name="tidak_bekerja" type="text" id="exampleInputFile" placeholder="tidak bekerja">
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
        <a class="btn btn-success" href="perkembangan_siswa.php"> <i class="fa fa-refresh"> Refresh</i> </a>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>tahun ajaran</th>
                            <th>siswa baru </th>
                            <th>lulus</th>
                            <th>melanjutkan ke PT</th>
                            <th>bekereja</th>
                            <th>tidak bekerja</th>
                            <th>Opsi </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM perkembangan_siswa");
                        while ($a = mysqli_fetch_assoc($query)) :
                        ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <span class="badge bg-blue"><?= $a['tahun']; ?></span></td>

                                <td> <span class="badge bg-green"><?= $a['siswa']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['lulus']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['lanjut']; ?></span></td>

                                <td> <span class="badge bg-yellow"><?= $a['bekerja']; ?></span></td>
                                <td> <span class="badge bg-red"><?= $a['tidak_bekerja']; ?></span></td>


                                <td>


                                    <a href="hapus_perkembangan.php?id=<?= $a['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></a>
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