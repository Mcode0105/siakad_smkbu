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
      akademik

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">akademik</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">



      </div>
      <div class="box-body">
        <div class="col-md-7">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Tahun akademik</h3>
              <?php
              if (isset($_GET['cek'])) {
                echo "<div class='alert alert-success'role='alert'>
           data berhasil di hapus.!
            </div>";
              }
              ?>
              <br>
              <br>

              <?php
              if (isset($_POST['simpan'])) {
                if (addakademik($_POST) > 0) {
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
                            <label for="exampleInputEmail1">akademik</label>
                            <input type="text" name="akademik" class="form-control" id="exampleInputEmail1" placeholder="akademik" require="">
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
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th style="width: 10px">No</th>
                  <th style="width: 30px">akademik</th>
                  <th style="width: 400px">Opsi </th>
                </tr>
                <?php
                $no = 1;
                $query = mysqli_query($conn, "SELECT * FROM tahun_akademik");
                while ($a = mysqli_fetch_assoc($query)) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td> <?= $a['tahun']; ?> </td>
                    <td>
                      <a href="hapus_t_akademik.php?id=<?= $a['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>


                    </td>
                  </tr>
                <?php
                  $no++;
                endwhile ?>
              </table>
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