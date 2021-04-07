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
            Edit Data Pesrta Didik

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Edit Data Peserta Didik </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">


        <div class="box">
            <br>
            <br>
            <?php
            if (isset($_GET['cek'])) {
                echo "<div class='alert alert-success'role='alert'>
           data berhasil di hapus.!
            </div>";
            } elseif (isset($_GET['gagal_hapus'])) {
                echo "<div class='alert alert-danger'role='alert'>
           data gagal di hapus.!
            </div>";
            }

            ?>
            <?php
            if (isset($_POST['edit'])) {
                if (edit_peserta_didik($_POST) > 0) {
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
        
         

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        $id = $_GET['id'];
                         $qw = mysqli_query($conn,"SELECT * FROM peserta_didik WHERE id = '$id' ");
                         $sa = mysqli_fetch_assoc($qw);
                          ?>
                        <div class="modal-body">
                            <form role="form" method="post" action="" enctype="multipart/form-data" >
                                <div class="box-body">
                                    <div class="col-xs-12">
                                        <label>Tahun Akademik</label>
                                        <select name="tahun" class="form-control">
                                                <option ><?=$sa['tahun']; ?></option>
                                            <?php for ($i= 2015; $i < 2030 ; $i++) : ?>
                                            	<option ><?=$i; ?></option>
                                            <?php endfor ?>
                                        </select>
                                    </div>
                                      <div class="col-xs-12">
                                        <label>kelas</label>
                                        <select name="kelas" class="form-control">
                                            <?php $as =mysqli_query($conn,"SELECT * FROM kelas"); 
                                                while ($a = mysqli_fetch_assoc($as) ) : ?>
                                                <option><?=$a['kelas']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                         <div class="col-xs-4">
                                            <label for="exampleInputFile">juli </label>
                                            <input type="hidden" name="id" value="">
                                            <input  class="form-control"  name="juli" type="text" id="exampleInputFile" placeholder="juli" >
                                        </div>
                                         <div class="col-xs-4">
                                            <label for="exampleInputFile">agustus </label>
                                            <input  class="form-control" name="agustus" type="text" id="exampleInputFile" placeholder="agustus" >
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="exampleInputFile">september </label>
                                            <input  class="form-control" name="september" type="text" id="exampleInputFile" placeholder="september" >
                                        </div>
                                        <div class="col-xs-4">
                                            <label for="exampleInputFile">oktober </label>
                                            <input  class="form-control" name="oktober" type="text" id="exampleInputFile" placeholder="oktober" >
                                        </div>
                                          <div class="col-xs-4">
                                            <label for="exampleInputFile">november </label>
                                            <input  class="form-control" name="november" type="text" id="exampleInputFile" placeholder="november" >
                                        </div>  <div class="col-xs-4">
                                            <label for="exampleInputFile">desember </label>
                                            <input  class="form-control" name="desember" type="text" id="exampleInputFile" placeholder="desember" >
                                        </div>  <div class="col-xs-4">
                                            <label for="exampleInputFile">januari </label>
                                            <input  class="form-control" name="januari" type="text" id="exampleInputFile" placeholder="januari" >
                                        </div>
                                          <div class="col-xs-4">
                                            <label for="exampleInputFile">februari </label>
                                            <input  class="form-control" name="februari" type="text" id="exampleInputFile" placeholder="februari" >
                                        </div>
                                          <div class="col-xs-4">
                                            <label for="exampleInputFile">maret </label>
                                            <input  class="form-control" name="maret" type="text" id="exampleInputFile" placeholder="maret" >
                                        </div>
                                          <div class="col-xs-4">
                                            <label for="exampleInputFile">april </label>
                                            <input  class="form-control" name="april" type="text" id="exampleInputFile" placeholder="april" >
                                        </div>  <div class="col-xs-4">
                                            <label for="exampleInputFile">mei </label>
                                            <input  class="form-control" name="mei" type="text" id="exampleInputFile" placeholder="mei" >
                                        </div>  <div class="col-xs-4">
                                            <label for="exampleInputFile">juni </label>
                                            <input  class="form-control" name="juni" type="text" id="exampleInputFile" placeholder="juni" >
                                        </div>
                                    <br>
                                    <br>

                                    <!-- /.box-body -->
                                    <div class="col-xs-12">
                                        <div class="box-footer">
                                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                                        </div>
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
        <a class="btn btn-success" href="peserta_didik.php"> <i class="fa fa-arrow-left"> kembali</i> </a>
        <div class="box-body">
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                         
                            <th>tahun ajaran</th>
                            <th>kelas </th>
                            <th>Juli</th>
                            <th>Agustus</th>
                            <th>September</th>
                            <th>Oktober</th>
                            <th>November </th>
                            <th>Desember </th>
                            <th>Januari </th>
                            <th>Februari </th>
                            <th>Maret </th>
                            <th>April </th>
                            <th>Mei </th>
                            <th>Juni </th>
                            <th>Aksi </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $id = $_GET['id'];
                        $query = mysqli_query($conn, "SELECT * FROM peserta_didik WHERE id = '$id' ");
                        while ($a = mysqli_fetch_assoc($query)) :
                        ?>
                        <tr>
                            <form role =from method="post" action="" >
                            <td> <select class="form-control" name="tahun" class="form-control">
                                    <option><?=$a['tahun'] ?></option>
                                            <?php for ($i= 2015; $i < 2030 ; $i++) : ?>
                                                <option><?=$i; ?></option>
                                            <?php endfor ?>
                                        </select> </td>
                
                            <td> <select class="form-control" name="kelas" class="form-control">
                                <option><?=$a['kelas']; ?></option>
                                            <?php 
                                            $q = mysqli_query($conn, "SELECT * FROM kelas");
                                            while($s = mysqli_fetch_assoc($q)) : ?>
                                                <option><?=$s['kelas'] ?></option>
                                            <?php endwhile ?>
                                        </select></td>
                            <td>
                                 <input type="hidden" name="id" value="<?=$a['id'] ?>">
                             <input class="form-control" style="width: 50px;" type="text" name="juli" value="<?=$a['juli'] ?>" ></td>
                            <td> <input class="form-control" style="width: 50px;" type="text" name="agustus" value="<?=$a['agustus'] ?>" ></td>
        
                            <td> <input class="form-control" style="width: 50px;" type="text" name="september" value="<?=$a['september'] ?>" ></td>
                            <td> <input class="form-control" style="width: 50px;" type="text" name="oktober" value="<?=$a['oktober'] ?>" ></td>
                            <td> <input class="form-control" style="width: 50px;" type="text" name="november" value="<?=$a['november'] ?>" ></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="desember" value="<?=$a['desember'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="januari" value="<?=$a['januari'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="februari" value="<?=$a['februari'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="maret" value="<?=$a['maret'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="april" value="<?=$a['april'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="mei" value="<?=$a['mei'] ?>" ></span></td>
                            <td>  <input class="form-control" style="width: 50px;" type="text" name="juni" value="<?=$a['juni'] ?>" ></td>
                            <td>
                            
                                <button type="submit" name="edit" class="btn btn-primary btn-sm"><i
                                        class="fa fa-edit" download >simpan</i></button>
                              
                            </td>
                            </form>
                        </tr>
                        <?php
                       
                        endwhile ?>

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