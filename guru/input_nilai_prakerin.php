<?php
session_start();
if (!isset($_SESSION['guru'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_guru/header.php';
include_once '../template_guru/sidebar.php';
include_once '../config/function.php';

if (isset($_POST['simpan'])) {
  if (nilaiprakerin($_POST) > 0 ) {
    echo "<script>
    alert('data berhasil disimpan')
    </script>";
  }else{
    echo "<script>
    alert('data gagal disimpan')
    </script>";
  }
}


?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        input Nilai Prakerin
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
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="row">
           <form role =form method="post" action="" enctype="multipart/form-data" >
            <div class="col-xs-2">
            
          
                                      <label>nama</label>
                                    <input type="text" class="form-control" name="nama"  value="<?= $_GET['nama']; ?>">
                                  </div>
                                   <div class="col-xs-2">
            
          
                                      <label>kelas</label>
                                    <input type="text" class="form-control" name="kelas"  value="<?= $_GET['kelas']; ?>">
                                  </div>
                                  
                                     
                                    <div class="col-xs-2">
                                      <label>Tempat</label>
                                    <input type="text" class="form-control" name="tempat"  placeholder="tempat">
                                  </div>
                                  <div class="col-xs-2">
                                      <label>lama prakerin</label>
                                    <input type="text" class="form-control" name="lama"  placeholder="lama">
                                  </div>
                                 <div class="col-xs-2">
                                      <label>nilai</label>
                                    <input type="text" class="form-control" name="nilai"  placeholder="nilai">
                                  </div>
                                   <div class="col-xs-2">
                                      <label>guru pembimbing</label>
                                    <input type="text" class="form-control" name="guru"  placeholder="guru">
                                  </div>
                                   <div class="col-xs-2">
                                            <label for="exampleInputFile">file sertifikat </label>
                                            <input class="form-control" name="foto" type="file" id="exampleInputFile">

                                        </div>
                                 
                                   <div class="col-xs-12">
                                    <br>  
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                            

           </form>
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
include_once '../template_guru/footer.php';
?>