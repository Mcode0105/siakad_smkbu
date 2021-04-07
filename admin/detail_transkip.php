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
      Data Transkip Nilai

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Transkip Nilai</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
      </div>
      <div class="box-body table-responsive">
        <div class="col-md-12">
          <br>
          <br>


          <!-- Button trigger modal -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box-header with-border">
              <h3 class="box-title">transkip</h3>
            </div>


            <div class="box-body">
              <?php
              $nama = $_GET['nama'];
              $kelas = $_GET['kelas']

              ?>
              <h4>nama : <?= $nama; ?></h4>
              <h4>kelas : <?= $kelas ?></h4>
              <table class="table table-bordered">
                <tr>

                  <th>Mapel</th>
                  <th style="text-align: center" colspan="6"> Nilai Pengetahuan</th>
                  <th style="text-align: center;" colspan="6"> Nilai Keterampilan</th>
                  <th style="text-align: center">Nilai Uas</th>
                  <th style="text-align: center">Nilai Uts</th>
                  <th style="text-align: center">Opsi</th>
                </tr>
                <?php
                $as = mysqli_query($conn, "SELECT * FROM transkip_nilai WHERE nama = '$nama' AND kelas = '$kelas' ");
                while ($r = mysqli_fetch_assoc($as)) :

                ?>
                  <tr>
                    <form role=form method="post" action="">
                      <td>
                        <div class="form-group">
                          <input type="text" name="np_kd3" class="form-control" id="exampleInputPassword1" placeholder="<?= $r['mapel'] ?>" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input type="hidden" name="nama" value="<?= $nama; ?>">
                          <input type="hidden" name="kelas" value="<?= $kelas; ?>">

                          <input style="width: 40px;" type="text" name="np_kd1" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd1']; ?>" placeholder="kd1" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="np_kd2" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd2']; ?>" placeholder="kd2">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="np_kd3" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd3']; ?>" placeholder="kd3">
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="np_kd4" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd4']; ?>" placeholder="kd4">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="np_kd5" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd5']; ?>" placeholder="kd5">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="np_kd6" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd6']; ?>" placeholder="kd6">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd1" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd1']; ?>" placeholder="kd1">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd2" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd2']; ?>" placeholder="kd2">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd3" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd3']; ?>" placeholder="kd3">
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd4" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd4']; ?>" placeholder="kd4">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd5" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd5']; ?>" placeholder="kd5">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="nk_kd6" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd6']; ?>" placeholder="kd6">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="uts" class="form-control" id="exampleInputPassword1" value="<?= $r['uts']; ?>" placeholder="uts">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 40px;" type="text" name="uas" class="form-control" id="exampleInputPassword1" value="<?= $r['uas']; ?>" placeholder="uas">
                        </div>
                      </td>
                      <td>
                        <a href="hapus_transkip.php?id=<?= $r['id']; ?>" class="btn btn-primary"><i class="fa fa-trash"></i></a>
                      </td>
                    </form>
                  </tr>
                <?php endwhile   ?>
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