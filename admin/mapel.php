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
           Mata Pelajaran

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Mata Pelajaran</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Mata Pelajaran</h3>
                <br>
                <br>
                <?php 
                if (isset($_POST['simpan'])) {
                        if (addmapel($_POST) > 0 ) {
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
                                            <label for="exampleInputEmail1">Nama</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="mata pelajaran" require="">
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
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Mata Pelajaran</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = mysqli_query($conn,"SELECT * FROM mapel");
                             while ( $row = mysqli_fetch_assoc($query) ) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                              
                                <td><?= $row['mapel']; ?></td>
                                <td>
                                     <a href="hapus_mapel.php?id=<?= $row['id']; ?>"
                                    class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i> hapus</a>
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
include_once '../template_admin/footer.php';
?>