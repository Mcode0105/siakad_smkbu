<?php
session_start();
if (!isset($_SESSION['siswa'])) {
  header("Location: ../login.php?ceklogin");
}
include_once '../template_siswa/header.php';
include_once '../template_siswa/sidebar.php';
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
      <div class="box-body">
        <div class="col-md-12">
          <br>
          <br>

          <!-- Button trigger modal -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box-header with-border">
              <h3 class="box-title">transkip</h3>
            </div>


            <div class="box-body table-responsive">
              <?php
              $nama = $_SESSION['siswa'];
              $as = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nama' ");
              $d = mysqli_fetch_assoc($as);
              $nama = $d['nama'];
              $kelas = $d['kelas'];
              ?>
              <h4>nama : <?= $d['nama']; ?></h4>
              <h4>kelas : <?= $d['kelas'] ?></h4>
              <a style="margin-bottom: 10px;" target="_blank" class="btn btn-primary" href="export_nilai.php?name=<?= $nama; ?>&kls=<?= $d['kelas']; ?>"><i class="fa fa-download"> download</i></a>
              <br>
              <table class="table table-bordered">
                <tr>

                  <th rowspan="2" style="text-align: center; padding-top: 20px;">Mapel</th>
                  <th style="text-align: center" colspan="6"> Nilai Pengetahuan</th>
                  <th style="text-align: center;" colspan="6"> Nilai Keterampilan</th>
                  <th rowspan="2" style="text-align: center">Nilai Uas</th>
                  <th rowspan="2" style="text-align: center">Nilai Uts</th>

                </tr>
                <tr>
                  <td>Kd1</td>
                  <td>Kd2</td>
                  <td>Kd3</td>
                  <td>Kd4</td>
                  <td>Kd5</td>
                  <td>Kd6</td>
                  <td>Kd1</td>
                  <td>Kd2</td>
                  <td>Kd3</td>
                  <td>Kd4</td>
                  <td>Kd5</td>
                  <td>Kd6</td>
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

                          <input style="width: 45px;" type="text" name="np_kd1" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd1']; ?>" placeholder="kd1" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="np_kd2" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd2']; ?>" placeholder="kd2" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="np_kd3" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd3']; ?>" placeholder="kd3" disabled="">
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="np_kd4" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd4']; ?>" placeholder="kd4" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="np_kd5" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd5']; ?>" placeholder="kd5" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="np_kd6" class="form-control" id="exampleInputPassword1" value="<?= $r['np_kd6']; ?>" placeholder="kd6" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd1" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd1']; ?>" placeholder="kd1" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd2" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd2']; ?>" placeholder="kd2" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd3" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd3']; ?>" placeholder="kd3" disabled="">
                        </div>
                      </td>

                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd4" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd4']; ?>" placeholder="kd4" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd5" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd5']; ?>" placeholder="kd5" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="nk_kd6" class="form-control" id="exampleInputPassword1" value="<?= $r['nk_kd6']; ?>" placeholder="kd6" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="uts" class="form-control" id="exampleInputPassword1" value="<?= $r['uts']; ?>" placeholder="uts" disabled="">
                        </div>
                      </td>
                      <td>
                        <div class="form-group">
                          <input style="width: 45px;" type="text" name="uas" class="form-control" id="exampleInputPassword1" value="<?= $r['uas']; ?>" placeholder="uas" disabled="">
                        </div>
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
include_once '../template_siswa/footer.php';
?>