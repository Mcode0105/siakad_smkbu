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
      Tambah data guru

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">guru</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Tambah data guru</h3>
        <?php
        if (isset($_POST['simpan'])) {
          if (addguru($_POST) > 0) {
            echo  "<div class='alert alert-success'role='alert'>
              Data Berhasil Ditambahkan ..!
              </div>
              <br>
              <a class ='btn btn-success' href='guru.php'> <i class ='fa fa-arrow-left' > kembali</i> </a>
              ";
          } else {
            echo  "<div class='alert alert-danger'role='alert'>
            Data gagal Ditambahkan ..!
            </div>
             <br>
               <a class ='btn btn-success' href='guru.php'> <i class ='fa fa-arrow-left' > kembali</i> </a>
            ";
          }
        }

        ?>

      </div>
      <div class="box-body">
        <div class="col-md-6">
          <!-- general form elements -->
          <div>
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama </label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">nuptk</label>
                  <input type="text" name="nuptk" class="form-control" id="exampleInputPassword1" placeholder="nuptk">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Status Kepegawaian</label>
                    <input type="text" name="status_pegawai" class="form-control" placeholder="Status Kepegawaian">
                  </div>

                  <div class="col-xs-6">
                    <label>Agama</label>
                    <select name="agama" class="form-control">
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="HINDU">HINDU</option>
                      <option value="BUDHA">BUDHA</option>
                    </select>
                  </div>
                  <div class="col-xs-12">
                    <label for="exampleInputPassword1">Alamat Lengkap</label>
                    <input type="text" name="alamat" class="form-control" placeholder=" lengkap">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">rt</label>
                    <input type="text" name="rt" class="form-control" placeholder="rt">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">rw</label>
                    <input type="text" name="rw" class="form-control" placeholder="rw">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">dusun</label>
                    <input type="text" name="dusun" class="form-control" placeholder="dusun lengkap">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">desa</label>
                    <input type="text" name="desa" class="form-control" placeholder="desa">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kode pos</label>
                    <input type="text" name="kodepos" class="form-control" placeholder="kodepos">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">telpon</label>
                    <input type="text" name="tlp" class="form-control" placeholder="telpon">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">hp</label>
                    <input type="text" name="hp" class="form-control" placeholder="hp" value="+62 ">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">email</label>
                    <input type="text" name="email" class="form-control" placeholder="email">
                  </div>

                  <div class="col-xs-12">
                    <label for="exampleInputPassword1">sk pengangkatan</label>
                    <input type="text" name="sk_pengangkatan" class="form-control" placeholder="sk pengangkatan">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">TMT pengangkatan</label>
                    <input type="date" name="tmt_pengangkatan" class="form-control" placeholder="TMT pengangkatan">
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kewarganegaraan </label>
                    <input type="text" name="kwrg" class="form-control" placeholder=" kewarganegaraan ">
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">nik </label>
                    <input type="text" name="nik" class="form-control" placeholder=" nik ">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">no kk </label>
                    <input type="text" name="nokk" class="form-control" placeholder=" no kk ">
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputFile">foto</label>
                    <input name="foto" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>

                </div>
                <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-check-circle"> Simpan</i></button>
                </div>
            </form>
          </div>
        </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_admin/footer.php';
?>