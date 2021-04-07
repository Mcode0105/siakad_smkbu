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
            Data Pesrta Didik

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
                if (peserta_didik($_POST) > 0) {
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
                                        <label>kelas</label>
                                        <select name="kelas" class="form-control">
                                            <?php $as = mysqli_query($conn, "SELECT * FROM kelas");
                                            while ($a = mysqli_fetch_assoc($as)) : ?>
                                                <option><?= $a['kelas']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">juli </label>
                                        <input class="form-control" name="juli" type="text" id="exampleInputFile" placeholder="juli">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">agustus </label>
                                        <input class="form-control" name="agustus" type="text" id="exampleInputFile" placeholder="agustus">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">september </label>
                                        <input class="form-control" name="september" type="text" id="exampleInputFile" placeholder="september">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">oktober </label>
                                        <input class="form-control" name="oktober" type="text" id="exampleInputFile" placeholder="oktober">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">november </label>
                                        <input class="form-control" name="november" type="text" id="exampleInputFile" placeholder="november">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">desember </label>
                                        <input class="form-control" name="desember" type="text" id="exampleInputFile" placeholder="desember">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">januari </label>
                                        <input class="form-control" name="januari" type="text" id="exampleInputFile" placeholder="januari">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">februari </label>
                                        <input class="form-control" name="februari" type="text" id="exampleInputFile" placeholder="februari">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">maret </label>
                                        <input class="form-control" name="maret" type="text" id="exampleInputFile" placeholder="maret">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">april </label>
                                        <input class="form-control" name="april" type="text" id="exampleInputFile" placeholder="april">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">mei </label>
                                        <input class="form-control" name="mei" type="text" id="exampleInputFile" placeholder="mei">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputFile">juni </label>
                                        <input class="form-control" name="juni" type="text" id="exampleInputFile" placeholder="juni">
                                    </div>
                                    <br>
                                    <br>

                                    <!-- /.box-body -->
                                    <div class="col-xs-12">
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
        <a class="btn btn-success" href="peserta_didik"> <i class="fa fa-refresh"> Refresh</i> </a>
        <div class="box-body">
            <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>tahun ajaran</th>
                            <th>kelas </th>
                            <th>Juli</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Oktober</th>
                            <th>November </th>
                            <th>Desember </th>
                            <th>Januari </th>
                            <th>Februari </th>
                            <th>Maret </th>
                            <th>April </th>
                            <th>Mei </th>
                            <th>Juni </th>
                            <th>Aksi </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM peserta_didik");
                        while ($a = mysqli_fetch_assoc($query)) :
                        ?>
                            <tr>

                                <td> <?= $no; ?></td>
                                <td> <span class="badge bg-red"><?= $a['tahun']; ?></span></td>

                                <td> <span class="badge bg-red"><?= $a['kelas']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['juli']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['agustus']; ?></span></td>

                                <td> <span class="badge bg-green"><?= $a['september']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['oktober']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['november']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['desember']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['januari']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['februari']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['maret']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['april']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['mei']; ?></span></td>
                                <td> <span class="badge bg-green"><?= $a['juni']; ?></span></td>
                                <td>

                                    <a href="edit_peserta_didik?id=<?= $a['id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit" download></i></a>
                                    <a href="hapus_peserta?id=<?= $a['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i></a>
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