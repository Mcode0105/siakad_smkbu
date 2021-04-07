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
            Wali kelas

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">wali kelas</a></li>

        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">



            </div>
            <div class="box-body">
                <div class="col-md-10">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Data Wali Kelas</h3>
                            <?php
                            if (isset($_GET['cek'])) {
                                echo "<div class='alert alert-success'role='alert'>
           data berhasil di hapus.!
            </div>";
                            } elseif (isset($_GET['gagal'])) {
                                echo "<div class='alert alert-danger'role='alert'>
           data gagal di hapus.!
            </div>";
                            }
                            ?>
                            <br>
                            <br>

                            <?php
                            if (isset($_POST['simpan'])) {
                                if (walikelas($_POST) > 0) {
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
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModal">
                                <i class="fa fa-plus"> tambah data</i>
                            </button>
                            <a class="btn btn-success" href="walikelas.php"> <i class="fa fa-refresh"> Refresh</i>
                            </a>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                        <label for="exampleInputEmail1">nama</label>
                                                        <input type="text" name="nama" class="form-control"
                                                            id="exampleInputEmail1" placeholder="Enter nama" require="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">nuptk</label>
                                                        <input type="text" name="nuptk" class="form-control"
                                                            id="exampleInputnuptk1" placeholder="nuptk" require="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">tanggal lahir</label>
                                                        <input type="date" name="tgl_lahir" class="form-control"
                                                            id="exampleInputPassword1" require="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">kelas</label>
                                                        <select name="kelas" class="form-control">
                                                            <option value="">---silahkan pilih---</option>
                                                            <?php $kelas = mysqli_query($conn, "SELECT * FROM kelas"); ?>
                                                            <?php while ($a = mysqli_fetch_assoc($kelas)) : ?>
                                                            <option value="<?= $a['kelas']; ?>"><?= $a['kelas']; ?>
                                                            </option>
                                                            <?php endwhile ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">email</label>
                                                        <input type="text" name="email" class="form-control"
                                                            id="exampleInputemail1" placeholder="email" require="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">password</label>
                                                        <input type="text" name="password" class="form-control"
                                                            id="exampleInputpassword1" placeholder="password"
                                                            require="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">Foto</label>
                                                        <input name="foto" type="file" id="exampleInputFile" require="">
                                                    </div>
                                                    <!-- /.box-body -->

                                                    <div class="box-footer">
                                                        <button type="submit" name="simpan"
                                                            class="btn btn-primary">Simpan</button>
                                                    </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <br>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                            <br>
                            <br>


                            <!-- awal -->
                            <?php $query =  mysqli_query($conn, "SELECT * FROM wali_kelas"); ?>
                            <?php while ($row = mysqli_fetch_assoc($query)) :  ?>
                            <div class="col-md-4">
                                <!-- Widget: user widget style 1 -->
                                <div class="box box-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <div class="widget-user-header bg-aqua-active">
                                        <h5 class="widget-user-username"> <?= $row['nama']; ?></h5>
                                        <h5 class="widget-user-desc"> <?= $row['nuptk']; ?></h5>


                                    </div>
                                    <div class="widget-user-image">
                                        <img class="img-circle" src="img/<?= $row['foto']; ?>" alt="User Avatar">
                                    </div>
                                    <div class="box-footer">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-12 border-right">
                                                    <div class="description-block">

                                                        <h4 class="widget-user-desc">Wali Kelas</h4>
                                                        <h5 class="widget-user-desc">
                                                            <strong><?= $row['kelas']; ?></strong> </h5>
                                                        <hr>
                                                        <h4 class="description-header"><a class="btn btn-danger"
                                                                href="hapus_walikelas.php?id=<?= $row['id']; ?>"> <i
                                                                    class="fa fa-trash"> Hapus</i> </a></h4>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /.col -->

                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                </div>
                                <!-- /.widget-user -->
                            </div>
                            <!-- /.col -->
                            <?php endwhile ?>

                            <!-- tutup --------------------------------------------------------------------- -->
                        </div>

                        <!-- akhir -->
                    </div>

                    <!-- /.box-body -->
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