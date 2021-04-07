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
                    <?php
                    if (isset($_POST['simpan'])) {
                        if (transkip($_POST) > 0) {
                            echo  "<div class='alert alert-success'role='alert'>
                            data berhasil disimpan.!
                            </div>";
                        } else {
                            echo  "<div class='alert alert-danger'role='alert'>
                            gagal disimpan..!
                            </div>";
                        }
                    }

                    ?>
                    <!-- Button trigger modal -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="box-header with-border">
                            <h3 class="box-title">transkip</h3>
                            
                        </div>
                       <div class="box-body">
                        <?php 
                        $nama = $_GET['nama'];
                        $kelas = $_GET['kelas'];

                         ?>

              <table class="table table-bordered">
                <tr>
                 
                  <th>Mapel</th>
                  <th style="text-align: center" colspan="6"> Nilai Pengetahuan</th>
                  <th style="text-align: center;" colspan="6"> Nilai Keterampilan</th>
                  <th style="text-align: center">Nilai Uas</th>
                  <th style="text-align: center">Nilai Uts</th>
                  <th style="text-align: center" >Opsi</th>
                </tr>
                 <tr>
              <form role = form method="post" action="" >
                  <td>
                        <div class="form-group">
                       <select name="mapel" class="form-control">
                            <option>---pilih mapel---</option>
                            <?php $a = mysqli_query($conn, "SELECT * FROM mapel "); ?>
                            <?php while ( $m = mysqli_fetch_assoc($a)) : ?>
                            <option><?=$m['mapel'] ?></option>   
                            <?php endwhile ?>             
                        </select>
                    </div>
                  </td>
                  <td>
                       <div class="form-group">
                        <input type="hidden" name="nama" value="<?=$nama; ?>">
                        <input type="hidden" name="kelas" value="<?=$kelas; ?>">

                     <input style="width: 40px;" type="text" name="np_kd1" class="form-control" id="exampleInputPassword1" placeholder="kd1">
                   </div>
                  </td>
                  <td> 
                     <div class="form-group">
                     <input style="width: 40px;" type="text" name="np_kd2" class="form-control" id="exampleInputPassword1" placeholder="kd2">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="np_kd3" class="form-control" id="exampleInputPassword1" placeholder="kd3">
                   </div>
                  </td>
                
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="np_kd4" class="form-control" id="exampleInputPassword1" placeholder="kd4">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="np_kd5" class="form-control" id="exampleInputPassword1" placeholder="kd5">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="np_kd6" class="form-control" id="exampleInputPassword1" placeholder="kd6">
                   </div>
                  </td>
                    <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd1" class="form-control" id="exampleInputPassword1" placeholder="kd1">
                   </div>
                  </td>
                  <td> 
                     <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd2" class="form-control" id="exampleInputPassword1" placeholder="kd2">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd3" class="form-control" id="exampleInputPassword1" placeholder="kd3">
                   </div>
                  </td>
                
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd4" class="form-control" id="exampleInputPassword1" placeholder="kd4">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd5" class="form-control" id="exampleInputPassword1" placeholder="kd5">
                   </div>
                  </td>
                  <td>
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="nk_kd6" class="form-control" id="exampleInputPassword1" placeholder="kd6">
                   </div>
                  </td>
                  <td > <div class="form-group">
                     <input style="width: 40px;" type="text" name="uts" class="form-control" id="exampleInputPassword1" placeholder="uts">
                   </div></td>
                  <td >
                       <div class="form-group">
                     <input style="width: 40px;" type="text" name="uas" class="form-control" id="exampleInputPassword1" placeholder="uas">
                   </div>
                  </td>
                  <td>
                  <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i></button>
                  </td>
              </form>
                </tr>
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
include_once '../template_guru/footer.php';
?>