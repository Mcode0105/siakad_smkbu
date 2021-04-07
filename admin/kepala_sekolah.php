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
            Kepala sekolah

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Kepala Sekolah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kepala sekolah</h3>
                <br>
                <br>
                 <?php
                    if (isset($_POST['simpan'])) {
                        if (kepala_sekolah($_POST) > 0) {
                            echo  "<div class='alert alert-success'role='alert'>
                           data berhasil ditambahkan
                            </div>";
                        } else {
                            echo  "<div class='alert alert-danger'role='alert'>
                            data gagal di tambahkan
                            </div>";
                        }
                    }

                    ?>

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"> tambah data</i>
                </button>

                <br>
                
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
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama" require="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control" id="exampleInputEmail1" placeholder="nama" require="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">nuptk</label>
                                            <input type="text" name="nuptk" class="form-control" id="exampleInputEmail1" placeholder="nuptk" require="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Menjabat dari tahun</label>
                                            <input type="text" name="tahun" class="form-control" id="exampleInputEmail1" placeholder="tahun ke" require="">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Pendidikan Terakhir</label>
                                            <input type="text" name="pendidikan" class="form-control" id="exampleInputEmail1" placeholder="Pendidikan Terakhir" require="">
                                        </div>
                                        <div class="col-xs-12">
                                            <label for="exampleInputFile">Foto </label>
                                            <input name="foto" type="file" id="exampleInputFile">
                                            <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                                        </div>

                                        <!-- /.box-body -->

                                        <div class="box-footer">
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
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

            <div class="box-body">
                <div class="box-body no-padding">
                    <table class="table">
                        <tr>
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Foto</th>
                            <th>Dari Tahun</th>
                            <th>Pendidikan Terakhir</th>
                            <th>Opsi </th>
                        </tr>
                        <?php
                        $no = 1;
                        $query = mysqli_query($conn, "SELECT * FROM kepala_sekolah");
                        while ($a = mysqli_fetch_assoc($query)) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td> <?= $a['nama']; ?> </td>
                                <td><img style="height: 60px;width: 60px;" src="img/<?= $a['foto']; ?>"> </td>
                                <td> <?= $a['tahun']; ?> </td>
                                <td> <?= $a['pendidikan']; ?> </td>
                                <td>
                                    <a href="hapus_kepalasekolah.php?id=<?= $a['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                        <?php
                            $no++;
                        endwhile ?>
                    </table>
                </div>
            </div>

            <!-- /.box-body -->

            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_admin/footer.php';
?>