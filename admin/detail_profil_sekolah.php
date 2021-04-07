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
            Profil Sekolah

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Profil Sekolah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div style="text-align: center" class="row">
                <div style="text-align: center" class="col-md-6">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                         <?php 
                        $w = mysqli_query($conn, "SELECT * FROM profil_sekolah");
                        $as = mysqli_fetch_assoc($w);
                         ?>
                        <div class="widget-user-header bg-aqua-active">
                            <h3 class="widget-user-username"></h3>
                            <h2 class="widget-user-desc"><?= $as['nama'] ?></i></h2>

                            <br>
                        </div>
                       
                        <div style="margin-top: 9px" class="widget-user-image">
                            <img class="img-circle" src="img/<?=$as['logo']; ?>" alt="User Avatar">

                        </div>
                        <div class="box-footer">
                            <div class="row">
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Kepala Sekolah</h5>
                                        <span class="description-text"><?=$as['kepalasekolah']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Npsn</h5>
                                        <span class="description-text"><?=$as['npsn']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">No Telpon</h5>
                                        <span class="description-text"><?=$as['nohp']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Email</h5>
                                        <span class="description-text"><?=$as['email']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Alamat</h5>
                                        <span class="description-text"><?=$as['alamat']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Rt / Rw</h5>
                                        <span class="description-text"><?=$as['rt']; ?> / <?=$as['rw']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Kode Pos</h5>
                                        <span class="description-text"><?=$as['kodepos']; ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Kelurahan</h5>
                                        <span class="description-text"><?=$as['kelurahan'] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Kecamatan</h5>
                                        <span class="description-text"><?=$as['kecamatan'] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Kabupaten</h5>
                                        <span class="description-text"><?=$as['kabupaten'] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Profinsi</h5>
                                        <span class="description-text"><?=$as['provinsi'] ?></span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div style="margin-top: 20px" class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">Status Pendidikan</h5>
                                        <span class="description-text"><?=$as['status'] ?></span>
                                    </div>

                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                              <a class="btn btn-primary" href="edit_profil_sekolah.php?id=<?= $as['id']; ?>"> <i class="fa fa-edit"> Edit Data</i> </a>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
                <!-- /.col -->
            </div>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_admin/footer.php';
?>