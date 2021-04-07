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



if (isset($_POST['simpan'])) {
  if (keaktifan_struktural($_POST) > 0 ) {
    echo "<script>
    alert('data berhasil di simpan');
    document.location.href='d_keaktifan_struktural.php';
    </script>";
  }else{
     echo "<script>
    alert('data gagal di simpan');
    </script>";
  }
}



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
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         <div class="row">
           <form role =form method="post" action="" >
            <div class="col-xs-2">
            
          
                                      <label>nama</label>
                                    <input type="text" class="form-control" name="nama"  value="<?= $_GET['nama']; ?>">
                                  </div>
                                   <div class="col-xs-2">
            
          
                                      <label>Jabatan</label>
                                    <input type="text" class="form-control" name="jabatan"  value="<?= $_GET['jabatan']; ?>">
                                  </div>
                                    <div class="col-xs-2">
                                        <label>Honor Pokok</label>
                                        <select name="honor_pokok" class="form-control" required="">
                                            <option>1200000</option>
                                            <option>550000</option>
                                            <option>600000</option>
                                            <option>300000</option>
                                            <option>250000</option>
                                            <option>150000</option>
                                            <option>200000</option>
                                            <option>50000</option>
                                            <option>400000</option>
                                            <option>100000</option>
                                            <option>350000</option>
                                        </select>
                                    </div>
                                     <div class="col-xs-2">
                                        <label>Bulan</label>
                                        <select name="bulan" class="form-control">
                                            <option>---pilih bulan---</option>
                                            <?php foreach ($bulan as $row) :  ?>
                                            <option value="<?= $row; ?>"><?= $row; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                         </div>
                                    <div class="col-xs-2">
                                      <label>tunjangan hadir</label>
                                    <input type="text" class="form-control" name="tunjangan_hadir" value="4000" placeholder="tunjangan hadir">
                                  </div>
                                  <div class="col-xs-2">
                                      <label>Jumlah Jam Ngantor</label>
                                    <input type="text" class="form-control" name="jml_jam_ngantor"  placeholder="jumlah jam ngantor">
                                  </div>
                                   <div class="col-xs-2">
                                      <label>Kehadiran/minggu 1</label>
                                    <input type="text" class="form-control" name="kh_minggu1"  placeholder="minggu 1">
                                  </div>
                                   <div class="col-xs-2">
                                      <label>Kehadiran/minggu 2</label>
                                    <input type="text" class="form-control" name="kh_minggu2"  placeholder="minggu 2">
                                  </div> <div class="col-xs-2">
                                      <label>Kehadiran/minggu 3</label>
                                    <input type="text" class="form-control" name="kh_minggu3"  placeholder="minggu 3">
                                  </div> <div class="col-xs-2">
                                      <label>Kehadiran/minggu 4</label>
                                    <input type="text" class="form-control" name="kh_minggu4"  placeholder="minggu 4">
                                  </div> <div class="col-xs-2">
                                      <label>Kehadiran/minggu 5</label>
                                    <input type="text" class="form-control" name="kh_minggu5"  placeholder="minggu 5">
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
include_once '../template_admin/footer.php';
?>