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
            Ganti Password

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Ganti Password</a></li>

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
                    <br>
                    <br>

                    <?php
                    if (isset($_POST['edit'])) {
                        if (ganti_password($_POST) > 0) {
                            echo  "<div class='alert alert-success'role='alert'>
                            Password berhasil di ganti..!
                            </div>";
                        } else {
                            echo  "<div class='alert alert-danger'role='alert'>
                            pasword gagal di ganti..!
                            </div>";
                        }
                    }

                    ?>
                    <!-- Button trigger modal -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">Ganti Password</h3>
                        </div>
                        <?php
                        $nama = $_SESSION['admin'];
                        $q = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$nama' ");
                        $row = mysqli_fetch_assoc($q);
                        ?>
                        <form role="form" method="post" action="">
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <label for="exampleInputEmail1">Pasword lama</label>
                                    <input type="text" name="passwordlama" class="form-control" id="exampleInputEmail1" placeholder="Password lama">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Pasword Baru</label>
                                    <input type="text" name="passwordbaru" class="form-control" id="exampleInputEmail1" placeholder="Password baru">
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="edit" class="btn btn-primary"><i class="fa fa-edit"> edit</i></button>
                                    <a class="btn btn-success" href="index"> <i class="fa fa-arrow-left"> kembali</i> </a>
                                </div>
                        </form>
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