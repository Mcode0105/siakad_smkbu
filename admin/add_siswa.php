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
      Tambah data Siswa

    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

      <li class="active">Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <?php
      if (isset($_POST['simpan'])) {
        if (siswa($_POST) > 0) {
          echo  "<div class='alert alert-success'role='alert'>
           Data  Berhasil Di simpan..!
          </div>";
        } else {
          echo  "<div class='alert alert-danger'role='alert'>
           Data  Gagal Di simpan..!
          </div>";
        }
      }

      ?>
      <div class="box-header with-border">
        <h3 class="box-title">Tambah data Siswa</h3>
      </div>
      <div class="box-body">
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama </label>
                  <input type="text" name="nama" class="form-control" id="exampleInputEmail1" placeholder="Nama siswa">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nisn</label>
                  <input type="text" name="nisn" class="form-control" id="exampleInputPassword1" placeholder="nisn" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nipd</label>
                  <input type="text" name="nipd" class="form-control" id="exampleInputPassword1" placeholder="nipd" required>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                    <option value="">---silahkan pilih---</option>
                    <option value="Laki laki">Laki laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                <div class="row">
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Tempat Lahir</label>
                    <input type="text" name="tmp_lahir" class="form-control" placeholder="Tempat Lahir" required>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">tanggal lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nik</label>
                    <input type="text" name="nik" class="form-control" placeholder="Nik">
                  </div>
                  <div class="col-xs-6">
                    <label>Agama</label>
                    <select name="agama" class="form-control" required>
                      <option value="">---silahkan pilih---</option>
                      <option value="ISLAM">ISLAM</option>
                      <option value="KRISTEN">KRISTEN</option>
                      <option value="BUDHA">BUDHA</option>
                      <option value="HINDU">HINDU</option>

                    </select>
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" placeholder="alamat">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">RT</label>
                    <input type="text" name="rt" class="form-control" placeholder="RT">
                  </div>
                  <div class="col-xs-4">
                    <label for="exampleInputPassword1">RW</label>
                    <input type="text" name="rw" class="form-control" placeholder="RW">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Dusun</label>
                    <input type="text" name="dusun" class="form-control" placeholder="Dusun ">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kelurahan</label>
                    <input type="text" name="kelurahan" class="form-control" placeholder="kelurahan">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kecamatan</label>
                    <input type="text" name="kecamatan" class="form-control" placeholder="kecamatan">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">kode pos</label>
                    <input type="text" name="kode_pos" class="form-control" placeholder="kode pos">
                  </div>
                  <div class="col-xs-6">
                    <label>Jenis Tinggal</label>
                    <select name="jns_tinggal" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="Asrama">Asrama</option>
                      <option value="Pondok Pesantren">Pondok Pesantren</option>
                      <option value="Rumah">Rumah</option>
                      <option value="Kontrak/kos">Kontrak/kos</option>

                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label>Alat Transportasi</label>
                    <select name="alt_transport" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="Sepda Motor">Sepda Motor</option>
                      <option value="Mobil">Mobil</option>
                      <option value="Jalan Kaki">Jalan Kaki</option>
                      <option value="Sepeda">Sepeda</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Telepon</label>
                    <input type="text" name="telpon" class="form-control" placeholder="telepon" value="+62">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Hp</label>
                    <input type="text" name="hp" class="form-control" placeholder="Hp" value="+62">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No SKHUN</label>
                    <input type="text" name="noskhun" class="form-control" placeholder="No SKHUN">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">email</label>
                    <input type="text" name="email" class="form-control" placeholder="email">
                  </div>
                  <div class="col-xs-6">
                    <label>Menerima KPS</label>
                    <select name="penerima_kps" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="iya">iya</option>
                      <option value="tidak">tidak</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No KPS</label>
                    <input type="text" name="nokps" class="form-control" placeholder="no kps">
                  </div>
                  <div class="col-xs-6">
                    <label>KELAS</label>
                    <select name="kelas" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <?php $kelas = mysqli_query($conn, "SELECT * FROM kelas"); ?>
                      <?php while ($a = mysqli_fetch_assoc($kelas)) : ?>
                        <option value="<?= $a['kelas']; ?>"><?= $a['kelas']; ?></option>
                      <?php endwhile ?>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No UN</label>
                    <input type="text" name="noun" class="form-control" placeholder="no un">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No IJAZAH</label>
                    <input type="text" name="noijazah" class="form-control" placeholder="no ijazah">
                  </div>
                  <div class="col-xs-6">
                    <label>Menerima KIP</label>
                    <select name="pnrma_kip" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="iya">iya</option>
                      <option value="tidak">tidak</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No Kip</label>
                    <input type="text" name="nokip" class="form-control" placeholder="no kip">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nama KIP</label>
                    <input type="text" name="namakip" class="form-control" placeholder="nama kip">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">NO KKS</label>
                    <input type="text" name="nokks" class="form-control" placeholder="no kks">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">NO Registrasi Akte Kelahiran</label>
                    <input type="text" name="noreg_akta" class="form-control" placeholder="NO Registrasi Akte Kelahiran">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">BANK</label>
                    <input type="text" name="bank" class="form-control" placeholder="bank">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No rekening Bank</label>
                    <input type="text" name="norek_bank" class="form-control" placeholder="No rek Bank">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Rekening Atas Nama</label>
                    <input type="text" name="rek_an" class="form-control" placeholder="rekening atas nama">
                  </div>
                  <div class="col-xs-6">
                    <label style="font-size: 12px;">Layak menerima kip (usulan dari sekolah) </label>
                    <select name="layak_pip" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="iya">iya</option>
                      <option value="tidak">tidak</option>
                    </select>
                  </div>
                  <div class="col-xs-12">
                    <label for="exampleInputPassword1">Alasan Layak pip</label>
                    <input type="text" name="alasan_layak_pip" class="form-control" placeholder="Alasan Layak pip">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Kebutuhan Khusus</label>
                    <input type="text" name="kebutuhan" class="form-control" placeholder="Kebutuhan Khusus">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Asal Sekolah</label>
                    <input type="text" name="asal_sekolah" class="form-control" placeholder="Asal Sekolah">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Anak Ke</label>
                    <input type="text" name="anak_ke" class="form-control" placeholder="Anak ke">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Lintang</label>
                    <input type="text" name="lintang" class="form-control" placeholder="lintang">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Bujur</label>
                    <input type="text" name="bujur" class="form-control" placeholder="bujur">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">No kk</label>
                    <input type="text" name="nokk" class="form-control" placeholder="no kk">
                  </div>
                  <div class="col-xs-3">
                    <label for="exampleInputPassword1">berat </label>
                    <input type="text" name="berat" class="form-control" placeholder="berat ">
                  </div>
                  <div class="col-xs-3">
                    <label for="exampleInputPassword1">tinggi</label>
                    <input type="text" name="tinggi" class="form-control" placeholder="tinggi">
                  </div>
                  <div class="col-xs-3">
                    <label for="exampleInputPassword1">lingkar kepala</label>
                    <input type="text" name="lingkar_kpl" class="form-control" placeholder="lingkar kepala">
                  </div>
                  <div class="col-xs-3">
                    <label for="exampleInputPassword1">jumlah saudara</label>
                    <input type="text" name="jmlh_saudara" class="form-control" placeholder="jumlah saudara">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Jarak rumah ke sekolah</label>
                    <input type="text" name="jrk_rumah_sekolah" class="form-control" placeholder="jarak rumah ke sekolah">
                  </div>
                  <div class="col-xs-6">
                    <label>JURUSAN</label>
                    <select name="jurusan" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <?php $jurusan = mysqli_query($conn, "SELECT * FROM jurusan"); ?>
                      <?php while ($j = mysqli_fetch_assoc($jurusan)) : ?>
                        <option value="<?= $j['jurusan']; ?>"><?= $j['jurusan']; ?></option>
                      <?php endwhile ?>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label>TAHUN AKADEMIN</label>
                    <select name="thn_akademik" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <?php $tahun = mysqli_query($conn, "SELECT * FROM tahun_akademik"); ?>
                      <?php while ($t = mysqli_fetch_assoc($tahun)) : ?>
                        <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                      <?php endwhile ?>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputFile">Foto Ijazah</label>
                    <input name="fotoijazah" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputFile">Foto skhun</label>
                    <input name="fotoskhu" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputFile">Foto kk</label>
                    <input name="fotokk" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>
                  <div class="col-xs-12">
                    <label for="exampleInputFile">Foto </label>
                    <input name="foto" type="file" id="exampleInputFile">
                    <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                  </div>



                  <!-- ------------------------------------------------------------------------------------------------------------ -->

                  <hr>
                  <br>
                  <p style="color:blue;font-size:16px;text-align: center;"><label for="exampleInputFile">BIODATA AYAH</label></p>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nama Ayah</label>
                    <input type="text" name="namaayah" class="form-control" placeholder="nama ayah">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">tahun lahir Ayah</label>
                    <input type="text" name="thnlahirayah" class="form-control" placeholder="tahun lahir ayah">
                  </div>
                  <div class="col-xs-6">
                    <label>Pendidikan Ayah</label>
                    <select name="pendidikanayah" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="Tidak tamat SD">Tidak tamat SD</option>
                      <option value="SD">SD</option>
                      <option value="SMK">SMK</option>
                      <option value="SMA">SMA</option>
                      <option value="MTS">MTS</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Peghasilan Ayah</label>
                    <input type="text" name="penghasilanayah" class="form-control" placeholder="Penghasilan ayah" value="Rp-">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Pekerjaan Ayah</label>
                    <input type="text" name="pekerjaanayah" class="form-control" placeholder="Pekerjaan ayah">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nik Ayah</label>
                    <input type="text" name="nikayah" class="form-control" placeholder="Nik ayah">
                  </div>
                  <br>
                  <br>
                  <p style="color:blue;font-size:16px;text-align: center;"><label for="exampleInputFile">BIODATA IBU</label></p>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nama Ibu</label>
                    <input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Tahun Lahir ibu</label>
                    <input type="text" name="thnlhribu" class="form-control" placeholder="tahun lahir ibu">
                  </div>
                  <div class="col-xs-6">
                    <label>Pendidikan Ibu</label>
                    <select name="pendidikanibu" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="Tidak tamat SD">Tidak tamat SD</option>
                      <option value="SD">SD</option>
                      <option value="SMK">SMK</option>
                      <option value="SMA">SMA</option>
                      <option value="MTS">MTS</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Pekerjaan ibu</label>
                    <input type="text" name="pekerjaanibu" class="form-control" placeholder="pekerjaan ibu">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Penghasilan ibu</label>
                    <input type="text" name="penghasilanibu" class="form-control" placeholder="penghasilan ibu">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nik ibu</label>
                    <input type="text" name="nikibu" class="form-control" placeholder="Nik ibu">
                  </div>
                  <p style="color:blue;font-size:16px;text-align: center;"><label for="exampleInputFile">BIODATA WALI</label></p>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nama Wali</label>
                    <input type="text" name="namawali" class="form-control" placeholder="Nama Ibu">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Tahun Lahir wali</label>
                    <input type="text" name="thnlhrwali" class="form-control" placeholder="tahun lahir Wali">
                  </div>
                  <div class="col-xs-6">
                    <label>Pendidikan Wali</label>
                    <select name="pendidikanwali" class="form-control">
                      <option value="">---silahkan pilih---</option>
                      <option value="Tidak tamat SD">Tidak tamat SD</option>
                      <option value="SD">SD</option>
                      <option value="SMK">SMK</option>
                      <option value="SMA">SMA</option>
                      <option value="MTS">MTS</option>
                    </select>
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Pekerjaan Wali</label>
                    <input type="text" name="pekerjaanwali" class="form-control" placeholder="pekerjaan Wali">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Penghasilan Wali</label>
                    <input type="text" name="penghasilanwali" class="form-control" placeholder="penghasilan ibu">
                  </div>
                  <div class="col-xs-6">
                    <label for="exampleInputPassword1">Nik Wali</label>
                    <input type="text" name="nikwali" class="form-control" placeholder="Nik Wali">
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