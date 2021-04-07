<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_admin/header.php';
include_once '../template_admin/sidebar.php';
include_once '../config/function.php';
$bulan = [
    "januari" => "januari",
    "februari" => "februari",
    "maret" => "maret",
    "april" => "april",
    "mei" => "mei",
    "juli" => "juli",
    "juni" => "juni",
    "agustus" => "agustus",
    "september" => "september",
    "oktober" => "oktober",
    "november" => "november",
    "desember" => "desember"
];
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = '$id' ");
$row    = mysqli_fetch_assoc($result);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Input rekap Absensi SEMESTER GANJIL

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">input rekap</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Input Data</h3>
                <?php
                if (isset($_POST['simpan'])) {
                    if (absenganjil($_POST) > 0) {
                        echo "<div class='alert alert-success' role='alert'>
                    Data Berhasil Di simpan..!
                </div>";
                    } else {

                        echo "<div class='alert alert-danger' role='alert'>
                    Data gagal Di simpan..!
                </div>";
                    }
                }

                ?>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4">
                        <form role="form" method="post" action="">
                            <div class="box-body">
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Nisn</label>
                                        <input type="text" class="form-control" name="nisn" placeholder="nisn">

                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Nama</label>
                                        <input type="text" class="form-control" name="nama" placeholder="nama">

                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label>kelas</label>
                                        <select name="semester" class="form-control">
                                            <option value="">---pilih kelas---</option>
                                            <?php $as = mysqli_query($conn, "SELECT * FROM kelas");
                                            while ($e = mysqli_fetch_assoc($as)) :
                                            ?>
                                                <option><?= $e['kelas'] ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label>Semster</label>
                                        <select name="semester" class="form-control">
                                            <option value="">---pilih smester---</option>
                                            <option value="GENAP">GENAP</option>
                                            <option value="GANJIL">GANJIL</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            <option>---pilih bulan---</option>
                                            <?php foreach ($bulan as $row) :  ?>
                                                <option value="<?= $row; ?>"><?= $row; ?></option>
                                            <?php endforeach ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label>Tahun</label>
                                        <select name="tahun" class="form-control">
                                            <option>---pilih tahun---</option>
                                            <?php for ($i = 2000; $i <= 2030; $i++) : ?>
                                                <option value="<?= $i; ?>"><?= $i; ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                </div>
                                <div style="text-align: center; font-size: 20px;" class="form-grup">
                                    <div class="col-md-12">
                                        <br>
                                        <label style="color: red;text-align: center;" for="exampleInputPassword1">Alfa</label>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Pagi</label>
                                        <input type="text" class="form-control" name="alfapagi" placeholder="pagi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="exampleInputPassword1">Siang</label>
                                    <input type="text" class="form-control" name="alfasiang" placeholder="siang">
                                </div>
                                <div style="text-align: center" class="form-grup">
                                    <div class="col-md-12">
                                        <br>
                                        <label style="color: green; text-align: center; font-size: 20px; " for="exampleInputPassword1">Sakit</label>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Pagi</label>
                                        <input type="text" class="form-control" name="sakitpagi" placeholder="pagi">
                                    </div>
                                </div>

                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Siang</label>
                                        <input type="text" class="form-control" name="sakitsiang" placeholder="siang">
                                    </div>
                                </div>
                                <div style="text-align: center" class="form-grup">
                                    <div class="col-md-12">
                                        <br>
                                        <label style="color: green; text-align: center; font-size: 20px; " for="exampleInputPassword1">Izin</label>
                                    </div>
                                </div>
                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Pagi</label>
                                        <input type="text" class="form-control" name="izinpagi" placeholder="pagi">
                                    </div>
                                </div>

                                <div class="form-grup">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1">Siang</label>
                                        <input type="text" class="form-control" name="izinsiang" placeholder="siang">
                                    </div>
                                </div>
                            </div>

                    </div>
                    <!-- /.box-body -->
                    <div style="margin-left: 100px" class="col-md-12">
                        <div class="box-footer">
                            <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>

                </div>

            </div>



            <!-- end -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <!-- Footer -->
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