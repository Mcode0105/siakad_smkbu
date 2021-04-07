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
      Guru

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">guru</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      </div>
      <div class="box-body">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Guru SMK Full Day Bustanul Ulum Bulugading</h3>
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

              <!-- Button trigger modal -->

              <a href="addguru.php" class="btn btn-success"> <i class="fa fa-plus"> tambah data</i><a />
                <a class="btn btn-primary" href="guru.php"> <i class="fa fa-refresh"> Refresh</i> </a>
                <br>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <br>
                  <br>
                  <!-- awal -->
                  <?php $query =  mysqli_query($conn, "SELECT * FROM guru"); ?>
                  <?php while ($row = mysqli_fetch_assoc($query)) :  ?>
                    <div class="col-md-4">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-aqua-active">
                          <h3 class="widget-user-username"> <?= $row['nama']; ?></h3>
                          <h5 class="widget-user-desc"><?= $row['nuptk']; ?></h5>
                        </div>
                        <div class="widget-user-image">
                          <img class="img-circle" src="img/<?= $row['foto']; ?>" alt="User Avatar">
                        </div>
                        <div class="box-footer">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="col-sm-12 border-right">
                                <div class="description-block">
                                  <h6 class="description-header"><i class="fa fa-envelope"> </i> <?= $row['email']; ?></h6>
                                  <h6 class="description-header"><i class="glyphicon glyphicon-phone"></i><?= $row['hp']; ?></h6>
                                  <h6 class="description-header"><i class="glyphicon glyphicon-user"></i><?= $row['tgl_lahir']; ?></h6>
                                  <h6 class="description-header"><i class="fa fa-map-marker margin-r-5"></i><?= $row['alamat']; ?></h6>
                                  <hr>
                                  <a class="btn btn-danger" href="hapusguru.php?id=<?= $row['id']; ?>"> <i class="fa fa-trash"> </i> </a>
                                  <a class="btn btn-primary" href="editguru.php?id=<?= $row['id']; ?>"> <i class="fa fa-edit"> </i> </a>
                                  <br>
                                  <br>
                                  <a class="btn btn-warning" target="blank" href="file_guru/<?= $row['ijazah']; ?>"> <i class="fa fa-download" download> ijazah </i> </a>
                                  <a class="btn btn-warning" target="blank" href="file_guru/<?= $row['transkip']; ?>"> <i class="fa fa-download" download> Transkip </i> </a>
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