<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: ../login.php?ceklogin");
}
include_once '../template_admin/header.php';
include_once '../template_admin/sidebar.php';
include_once '../config/function.php';




?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <?php
      $nama = $_GET['nama'];
      $jabatan = $_GET['jabatan'];
      $as = mysqli_query($conn, "SELECT * FROM keaktifan_struktural WHERE nama = '$nama' AND jabatan = '$jabatan' ");
      $k = mysqli_fetch_assoc($as);

      ?>
      <div class="box-body">
        <div class="row">
          <div class="col-md-10">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active">
                <h3 class="widget-user-username"><?= $_GET['nama'] ?></h3>
                <h5 class="widget-user-desc"><?= $_GET['jabatan'] ?></h5>

              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="img/logo.png" alt="User Avatar">
              </div>
              <div class="box-footer">
                <div class="row">
                  <div class="box-body table-responsive">
                    <table class="table table-bordered">
                      <tr>
                        <th>no</th>
                        <th>bulan</th>
                        <th>Tunjagan</th>
                        <th>Jumlah Jam Ngantor</th>
                        <th>Tunjangan /ngantor</th>
                        <th colspan="5">minggu</th>
                        <th>jumlah ngantor/minggu</th>
                        <th>total jumlah ngantor</th>
                        <th>total jumlah yg diterima</th>
                      </tr>
                      <?php
                      $nama = $_GET['nama'];
                      $jabatan = $_GET['jabatan'];
                      $no = 1;
                      $m = mysqli_query($conn, "SELECT * FROM keaktifan_struktural WHERE nama = '$nama' AND jabatan = '$jabatan' ");
                      while ($r = mysqli_fetch_assoc($m)) : ?>
                        <tr>
                          <td><?= $no; ?></td>
                          <th><?= $r['bulan']; ?></th>
                          <td><?= $r['honor_pokok']; ?></td>
                          <td><?= $r['jml_jam_ngantor']; ?></td>
                          <td><?= $r['tunjangan_hadir']; ?></td>
                          <td><?= $r['kh_m1']; ?></td>
                          <td><?= $r['kh_m2']; ?></td>
                          <td><?= $r['kh_m3']; ?></td>
                          <td><?= $r['kh_m4']; ?></td>
                          <td><?= $r['kh_m5']; ?></td>
                          <td><?= $r['jml_ngantor_minggu']; ?></td>
                          <td>Rp <?= $r['jml_ngantor']; ?></td>
                          <td>Rp <?= $r['jumlah_total']; ?></td>
                        </tr>
                      <?php
                        $no++;
                      endwhile   ?>

                    </table>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                Footer
              </div>
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