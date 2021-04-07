<?php
session_start();
if (!isset($_SESSION['guru'])) {
  header("Location: ../login.php?ceklogin");
}
include_once '../template_guru/header.php';
include_once '../template_guru/sidebar.php';
include_once '../config/function.php';
?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Biodata guru

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">biodata guru</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="row center">
      <div class="col-md-7">

        <!-- Profile Image -->
        <?php
        $guru = $_SESSION['guru'];
        $query = mysqli_query($conn, "SELECT * FROM guru WHERE email = '$guru' ");
        $as = mysqli_fetch_assoc($query);
        ?>
        <div class="box box-primary center">
          <div class="box-body box-profile">
            <img class="profile-user-img img-responsive img-circle" src="../admin/img/<?= $as['foto']; ?>" alt="User profile picture">

            <h3 class="profile-username text-center"><?= $as['nama']; ?></h3>

            <p class="text-muted text-center"><?= $as['nuptk']; ?></p>
            <p class="text-muted text-center"><?= $as['status_pegawai']; ?></p>

            <ul style="padding: 60px;" class="nav nav-stacked">
              <li class="list-group-item">
                <b>Jenis Kelamin <span class="pull-right badge bg-blue"><?= $as['jk']; ?></span></b></li>
              <li class="list-group-item">
                <b>Tempat Lahir<span class="pull-right badge bg-blue"><?= $as['tmpt_lahir']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>NIK<span class="pull-right badge bg-blue"><?= $as['nik']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Alamat
                  <span class="pull-right badge bg-blue"><?= $as['alamat']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>No kk <span class="pull-right badge bg-blue"><?= $as['No kk']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Tanggal Lahir
                  <span class="pull-right badge bg-blue"><?= $as['tgl_lahir']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Agama<span class="pull-right badge bg-blue"><?= $as['agama']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Rt<span class="pull-right badge bg-blue"><?= $as['rt']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Rw<span class="pull-right badge bg-blue"><?= $as['rw']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Dusun<span class="pull-right badge bg-blue"><?= $as['dusun']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Kecamatan<span class="pull-right badge bg-blue"><?= $as['kecamatan']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Hp<span class="pull-right badge bg-blue"><?= $as['hp']; ?></span></b>

              </li>
              <li class="list-group-item">
                <b>Email<span class="pull-right badge bg-blue"><?= $as['email']; ?></span></b>
              </li>
              <li class="list-group-item">
                <b>Ijazah<span class="pull-right badge bg-blue"><a style="color: white;" href="../admin/file_guru/<?= $as['ijazah']; ?>" class="fa fa-eye "> Lihat</a></span></b>
              </li>
              <li class="list-group-item">
                <b>Transkip<span class="pull-right badge bg-blue"><a style="color: white;" href="../admin/file_guru/<?= $as['transkip']; ?>" class="fa fa-eye "> Lihat</a></span></b>
              </li>
            </ul>
          </div>


          <!-- /.box-body -->
        </div>
      </div>
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_guru/footer.php';
?>