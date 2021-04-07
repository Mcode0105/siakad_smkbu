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
      Adminstrator

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Administrator</a></li>

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
              <h3 class="box-title">Data Administrator</h3>
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
                if (addadmin($_POST) > 0) {
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-plus"> tambah data</i>
              </button>
              <a class="btn btn-success" href="administrator.php"> <i class="fa fa-refresh"> Refresh</i> </a>

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
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" name="username" class="form-control" id="exampleInputEmail1" placeholder="Enter username" require="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" require="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Konfirmasi Pasword</label>
                            <input type="password" name="password1" class="form-control" id="exampleInputPassword1" placeholder="Password" require="">
                          </div>
                          <div class="form-group">
                            <label for="exampleInputFile">Foto</label>
                            <input name="foto" type="file" id="exampleInputFile" require="">
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
            <br>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <br>
              <br>


              <!-- awal -->
              <?php $query =  mysqli_query($conn, "SELECT * FROM admin"); ?>
              <?php while ($row = mysqli_fetch_assoc($query)) :  ?>
                <div class="col-md-4">
                  <!-- Widget: user widget style 1 -->
                  <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-aqua-active">
                      <h3 class="widget-user-username"> <?= $row['username']; ?></h3>
                      <h5 class="widget-user-desc">Adminstrator</h5>
                    </div>
                    <div class="widget-user-image">
                      <img class="img-circle" src="img/<?= $row['foto']; ?>" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="col-sm-12 border-right">
                            <div class="description-block">
                              <span class="description-text">tanggal pembuatan akun</span>
                              <h5 class="description-header"><?= $row['created']; ?></h5>
                              <hr>
                              <h4 class="description-header"><a class="btn btn-danger" href="hapus.php?id=<?= $row['id']; ?>"> <i class="fa fa-trash"> Hapus</i> </a></h4>
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