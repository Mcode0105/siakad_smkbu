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
          Jadwal Penggunaan Laboratorium

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Jadwal Penggunaan laboratorium</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Jadwal Penggunaan Laboratorium</h3>
                <br>
                <br>
                <?php 
                if (isset($_POST['simpan'])) {
                        if (addlab($_POST) > 0 ) {
                                 echo  "<div class='alert alert-success'role='alert'>
                                                data berhasil di tambahkan..!
                                                </div>";
                        }else{
                             echo  "<div class='alert alert-danger'role='alert'>
                                                data gagal di tambahkan
                                                </div>";
                        }
                    }
                 ?>
                 <?php if (isset($_GET['cek'])) {
                    echo "<div class='alert alert-success'role='alert'>
                         data berhasil di hapus</div>";
                 } ?>
              
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

                                            <input type="hidden" name="tgl" class="form-control" id="exampleInputEmail1" placeholder="" value="<?= hari() . ", " . date("d-m-Y"); ?>" require="">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="exampleInputFile">file </label>
                                            <input name="foto" type="file" id="exampleInputFile" class="form-control">
                                            </div>
                                        </div>
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
            <div class="box-body">
                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>tanggal input</th>
                          
                                 <th>file</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($conn,"SELECT * FROM jadwal_lab");
                             while ( $row = mysqli_fetch_assoc($query) ) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $row['tgl']; ?></td>
                         
                                <td><?= $row['file']; ?></td>
                                <td>
                                    <a href="../admin/img/<?= $row['file']; ?>" download
                                    class="btn btn-info btn-sm"><i class="fa fa-download"></i> download</a>
               
                                </td>
                            </tr>
                        <?php
                        $no++;
                         endwhile
                         ?>

                            </tfoot>
                    </table>
                </div>

                <!-- /.box-body -->

            </div>
            <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_guru/footer.php';
?>