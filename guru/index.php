<?php
session_start();
if (!isset($_SESSION['guru'])) {
    header("Location: ../login.php?ceklogin");
}
include_once "../template_guru/header.php";
include_once "../template_guru/sidebar.php";
$nama = $_SESSION['guru'];
$query = mysqli_query($conn, "SELECT * FROM guru WHERE email = '$nama' ");
$row = mysqli_fetch_assoc($query);

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="callout callout-success">
            <h4>ASSALAMUALAIKUM. SELAMAT <?= waktu(); ?>, <?= $row['nama']; ?> </h4>
            <p>Apa Kabar Hari Ini..? Semoga Selalu Berada di Lindungan Allah SWT</p>
        </div>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div style="text-align: center;" class="row">

            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <img style="text-align: center; width: 250px; height: 250px;opacity: 5.0;" src="../admin/img/logo.png" alt="">
                <h1 style="color: blue;font-family: Arial Black;">SMK Full Day Bustanul Ulum </h1>
                <h1 style="color: blue;font-family: Arial Black;"> <?= date("Y"); ?> </h1>

            </div>
        </div>
        <!-- ./col -->

</div>
<!-- right col -->
</div>


</section>
<!-- /.content -->
</div>
<?php
include_once "../template_guru/footer.php";

?>