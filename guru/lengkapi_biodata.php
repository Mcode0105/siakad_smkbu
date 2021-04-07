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
      data guru

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
        <h3 class="box-title">edit data guru</h3>
        <?php
        $nama = $_SESSION['guru'];
        $result = mysqli_query($conn, "SELECT * FROM guru WHERE email = '$nama' ");
        $g = mysqli_fetch_assoc($result);
        if (isset($_POST['simpan'])) {
          if (editguru($_POST) > 0) {
            echo  "<div class='alert alert-success'role='alert'>
              Data Berhasil edit ..!
              </div>
              <br>
              <a class ='btn btn-success' href='index.php'> <i class ='fa fa-arrow-left' > kembali</i> </a>
              ";
          } else {
            echo  "<div class='alert alert-danger'role='alert'>
            Data gagal Ditambahkan ..!
            </div>
             <br>
               <a class ='btn btn-success' href='index.php'> <i class ='fa fa-arrow-left' > kembali</i> </a>
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
                  <input type="hidden" name="id" value="<?= $g['id']; ?>">
                  <input type="text" name="nama" value="<?= $g['nama']; ?>" class="form-control" id="exampleInputEmail1" placeholder="nama" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">nuptk</label>
                  <input type="text" name="nuptk" value="<?= $g['nuptk']; ?>" class="form-control" id="exampleInputPassword1" placeholder="nuptk">
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control">
                      <option value="<?= $g['jk']; ?>">--pilih---</option>
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" value="<?= $g['tmp_lahir']; ?>" class="form-control" placeholder="Tempat Lahir">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?= $g['tgl_lahir']; ?>" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Status Kepegawaian</label>
                    <input type="text" name="status_pegawai" class="form-control" placeholder="Status Kepegawaian" value="<?= $g['status_pegawai']; ?>">
                  </div>

                  <div class="col-xs-6">
                    <label>Agama</label>
                    <select name="agama" class="form-control">
                      <option value="<?= $g['agama']; ?>">---pilih---</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="HINDU">HINDU</option>
                      <option value="BUDHA">BUDHA</option>
                    </select>
                  </div>
                  <div class="col-xs-12">
                    <label for="exampleInputPassword1">Alamat Lengkap</label>
                    <input type="text" name="alamat" value="<?= $g['alamat']; ?>" class="form-control" placeholder=" lengkap">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">rt</label>
                    <input type="text" name="rt" class="form-control" value="<?= $g['rt']; ?>" placeholder="rt">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">rw</label>
                    <input type="text" name="rw" class="form-control" placeholder="rw" value="<?= $g['rw']; ?>">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">dusun</label>
                    <input type="text" name="dusun" class="form-control" placeholder="dusun lengkap" value="<?= $g['dusun']; ?>">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">desa</label>
                    <input type="text" name="desa" class="form-control" placeholder="desa" value="<?= $g['desa']; ?>">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan" value="<?= $g['kecamatan']; ?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kode pos</label>
                    <input type="text" name="kodepos" class="form-control" placeholder="kodepos" value="<?= $g['kode_pos'] ?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">telpon</label>
                    <input type="text" name="tlp" class="form-control" placeholder="telpon" value="<?= $g['tlp'] ?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">hp</label>
                    <input type="text" name="hp" class="form-control" placeholder="hp" value="<?= $g['hp'] ?> ">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">email</label>
                    <input type="text" name="email" class="form-control" placeholder="email" value="<?= $g['email'] ?>">
                  </div>

                  <div class="col-xs-12">
                    <label for="exampleInputPassword1">sk pengangkatan</label>
                    <input type="text" name="sk_pengangkatan" class="form-control" placeholder="sk pengangkatan" value="<?= $g['sk_pengangkatan']; ?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">TMT pengangkatan</label>
                    <input type="date" name="tmt_pengangkatan" class="form-control" placeholder="TMT pengangkatan" value="<?= $g['tmt_pengangkatan']; ?>">
                  </div>


                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kewarganegaraan </label>
                    <input type="text" name="kwrg" class="form-control" placeholder=" kewarganegaraan " value="<?= $g['kwrg']; ?>">
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">nik </label>
                    <input type="text" name="nik" class="form-control" placeholder=" nik " value="<?= $g['nik']; ?>">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">no kk </label>
                    <input type="text" name="nokk" class="form-control" placeholder=" no kk " value="<?= $g['nokk']; ?>">
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputFile">Ijazah</label>
                    <input type="hidden" name="ijazahlama" value="<?= $g['ijazah']; ?>">
                    <input name="ijazah" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>

                  <div class="col-xs-6">
                    <label for="exampleInputFile">Transkip</label>
                    <input type="hidden" name="transkiplama" value="<?= $g['transkip']; ?>">
                    <input name="transkip" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputFile">foto</label>
                    <input type="hidden" name="fotolama" value="<?= $g['foto']; ?>">
                    <input name="foto" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>

                </div>
                <div class="box-footer">
                  <button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"> simpan</i></button>
                </div>
            </form>
          </div>
        </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
include_once '../template_guru/footer.php';
?>