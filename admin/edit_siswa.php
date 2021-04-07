<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_admin/header.php';
include_once '../template_admin/sidebar.php';
include_once '../config/function.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id ");
$as = mysqli_fetch_assoc($result);
?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Edit data Siswa

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Edit siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <?php
            if (isset($_POST['edit'])) {
                if (editsiswa($_POST) > 0) {
                    echo  "<div class='alert alert-success'role='alert'>
           Data  Berhasil Di Ubah..!
          </div>
    <a class='btn btn-success' href='siswa.php'> <i class='fa fa-refresh'> Refresh</i> </a>
          
          ";
                } else {
                    echo  "<div class='alert alert-danger'role='alert'>
           Data  Gagal Di Ubah..!
          </div>";
                }
            }

            ?>
            <div class="box-header with-border">
                <h3 class="box-title">Edit data Siswa</h3>
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
                                    <input type="hidden" name="id" class="form-control" id="exampleInputEmail1"
                                        placeholder="N" value="<?= $as['id']; ?>">
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nama siswa" value="<?= $as['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nisn</label>
                                    <input type="text" name="nisn" value="<?= $as['nisn']; ?>" class="form-control"
                                        id="exampleInputPassword1" placeholder="nisn" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nipd</label>
                                    <input type="text" name="nipd" value="<?= $as['nipd']; ?>" class="form-control"
                                        id="exampleInputPassword1" placeholder="nipd" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jk" class="form-control">
                                        <option>---silahkan pilih---</option>
                                        <option selected value="<?= $as['jk']; ?>"><?= $as['jk']; ?></option>
                                        <option value="Laki laki">Laki laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Tempat Lahir</label>
                                        <input type="text" value="<?= $as['tmpt_lahir']; ?>" name="tmp_lahir"
                                            class="form-control" placeholder="Tempat Lahir" required>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">tanggal lahir</label>
                                        <input type="date" name="tgl_lahir" value="<?= $as['tgl_lahir']; ?>"
                                            class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nik</label>
                                        <input type="text" value="<?= $as['nik']; ?>" name="nik" class="form-control"
                                            placeholder="Nik">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Agama</label>
                                        <select name="agama" class="form-control" required>
                                            <option>---silahkan pilih---</option>
                                            <option selected value="<?= $as['agama']; ?>"><?= $as['agama']; ?></option>
                                            <option value="ISLAM">ISLAM</option>
                                            <option value="KRISTEN">KRISTEN</option>
                                            <option value="BUDHA">BUDHA</option>
                                            <option value="HINDU">HINDU</option>

                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">Alamat</label>
                                        <input type="text" name="alamat" value="<?= $as['alamat']; ?>"
                                            class="form-control" placeholder="alamat">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">RT</label>
                                        <input type="text" name="rt" value="<?= $as['rt']; ?>" class="form-control"
                                            placeholder="RT">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">RW</label>
                                        <input type="text" name="rw" value="<?= $as['rw']; ?>" class="form-control"
                                            placeholder="RW">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Dusun</label>
                                        <input type="text" name="dusun" value="<?= $as['dusun']; ?>"
                                            class="form-control" placeholder="Dusun ">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">kelurahan</label>
                                        <input type="text" name="kelurahan" value="<?= $as['kelurahan']; ?>"
                                            class="form-control" placeholder="kelurahan">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">kecamatan</label>
                                        <input type="text" name="kecamatan" value="<?= $as['kecamatan']; ?>"
                                            class="form-control" placeholder="kecamatan">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">kode pos</label>
                                        <input type="text" name="kode_pos" value="<?= $as['kode_pos']; ?>"
                                            class="form-control" placeholder="kode pos">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Jenis Tinggal</label>
                                        <select name="jns_tinggal" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?= $as['jns_tinggal']; ?>">
                                                <?= $as['jns_tinggal']; ?></option>
                                            <option value="Asrama">Asrama</option>
                                            <option value="Pondok Pesantren">Pondok Pesantren</option>
                                            <option value="Rumah">Rumah</option>
                                            <option value="Kontrak/kos">Kontrak/kos</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Alat Transportasi</label>
                                        <select name="alat_transport" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?= $as['alat_transport']; ?>">
                                                <?= $as['alat_transport']; ?></option>
                                            <option value="Sepda Motor">Sepda Motor</option>
                                            <option value="Mobil">Mobil</option>
                                            <option value="Jalan Kaki">Jalan Kaki</option>
                                            <option value="Sepeda">Sepeda</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Telepon</label>
                                        <input type="text" name="telpon" value="<?= $as['telpon']; ?>"
                                            class="form-control" placeholder="telepon" value="+62">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Hp</label>
                                        <input type="text" name="hp" value="<?= $as['hp']; ?>" class="form-control"
                                            placeholder="Hp" value="+62">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No SKHUN</label>
                                        <input type="text" name="noskhun" value="<?= $as['skhun']; ?>"
                                            class="form-control" placeholder="No SKHUN">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">email</label>
                                        <input type="text" name="email" value="<?= $as['email']; ?>"
                                            class="form-control" placeholder="email">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Menerima KPS</label>
                                        <select name="penerima_kps" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?= $as['penerima_kps']; ?>">
                                                <?= $as['penerima_kps']; ?></option>
                                            <option value="iya">iya</option>
                                            <option value="tidak">tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No KPS</label>
                                        <input type="text" value="<?= $as['nokps']; ?>" name="nokps"
                                            class="form-control" placeholder="no kps">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>KELAS</label>
                                        <select name="kelas" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?= $as['kelas']; ?>"><?= $as['kelas']; ?></option>
                                            <?php $kelas = mysqli_query($conn, "SELECT * FROM kelas"); ?>
                                            <?php while ($a = mysqli_fetch_assoc($kelas)) : ?>
                                            <option value="<?= $a['kelas']; ?>"><?= $a['kelas']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No UN</label>
                                        <input type="text" name="noun" value="<?= $as['noun']; ?>" class="form-control"
                                            placeholder="no un">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No IJAZAH</label>
                                        <input type="text" name="noijazah" value="<?= $as['noijazah']; ?>"
                                            class="form-control" placeholder="no ijazah">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Menerima KIP</label>
                                        <select name="pnrma_kip" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?=$as['pnrma_kip']; ?>"><?= $as['pnrma_kip']; ?>
                                            </option>
                                            <option value="iya">iya</option>
                                            <option value="tidak">tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No Kip</label>
                                        <input type="text" name="nokip" value="<?= $as['nomorkip']; ?>"
                                            class="form-control" placeholder="no kip">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nama KIP</label>
                                        <input type="text" name="namakip" value="<?= $as['namakip']; ?>"
                                            class="form-control" placeholder="nama kip">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">NO KKS</label>
                                        <input type="text" name="nokks" value="<?= $as['nokks']; ?>"
                                            class="form-control" placeholder="no kks">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">NO Registrasi Akte Kelahiran</label>
                                        <input type="text" name="noreg_akta" value="<?= $as['noreg_akta']; ?>"
                                            class="form-control" placeholder="NO Registrasi Akte Kelahiran">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">BANK</label>
                                        <input type="text" name="bank" class="form-control" value="<?= $as['bank']; ?>"
                                            placeholder="bank">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No rekening Bank</label>
                                        <input type="text" name="norek_bank" class="form-control"
                                            value="<?= $as['norek_bank']; ?>" placeholder="No rek Bank">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Rekening Atas Nama</label>
                                        <input type="text" name="rek_an" value="<?= $as['rek_an']; ?>"
                                            class="form-control" placeholder="rekening atas nama">
                                    </div>
                                    <div class="col-xs-6">
                                        <label style="font-size: 12px;">Layak menerima kip (usulan dari sekolah)
                                        </label>
                                        <select name="layak_pip" class="form-control">
                                            <option selected value="<?= $as['layak_pip']; ?>"><?= $as['layak_pip']; ?>
                                            </option>
                                            <option value="">---silahkan pilih---</option>
                                            <option value="iya">iya</option>
                                            <option value="tidak">tidak</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputPassword1">Alasan Layak pip</label>
                                        <input type="text" name="alasan_layak_pip" value="<?= $as['alasan_lyk_pip']; ?>"
                                            class="form-control" placeholder="Alasan Layak pip">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Kebutuhan Khusus</label>
                                        <input type="text" name="kebutuhan" class="form-control"
                                            value="<?= $as['kebutuhan']; ?>" placeholder="Kebutuhan Khusus">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control"
                                            value="<?= $as['asal_sekolah']; ?>" placeholder="Asal Sekolah">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Anak Ke</label>
                                        <input type="text" name="anak_ke" class="form-control"
                                            value="<?= $as['anak_ke']; ?>" placeholder="Anak ke">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Lintang</label>
                                        <input type="text" name="lintang" class="form-control"
                                            value="<?= $as['lintang']; ?>" placeholder="lintang">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Bujur</label>
                                        <input type="text" name="bujur" class="form-control"
                                            value="<?= $as['bujur']; ?>" placeholder="bujur">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">No kk</label>
                                        <input type="text" name="nokk" class="form-control" value="<?= $as['nokk']; ?>"
                                            placeholder="no kk">
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="exampleInputPassword1">berat </label>
                                        <input type="text" name="berat" class="form-control"
                                            value="<?= $as['berat']; ?>" placeholder="berat ">
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="exampleInputPassword1">tinggi</label>
                                        <input type="text" name="tinggi" class="form-control"
                                            value="<?= $as['tinggi']; ?>" placeholder="tinggi">
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="exampleInputPassword1">lingkar kepala</label>
                                        <input type="text" name="lingkar_kpl" class="form-control"
                                            value="<?= $as['lingkar_kpl']; ?>" placeholder="lingkar kepala">
                                    </div>
                                    <div class="col-xs-3">
                                        <label for="exampleInputPassword1">jumlah saudara</label>
                                        <input type="text" name="jmlh_saudara" class="form-control"
                                            value="<?= $as['jml_saudara']; ?>" placeholder="jumlah saudara">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Jarak rumah ke sekolah</label>
                                        <input type="text" name="jrk_rumah_sekolah" class="form-control"
                                            value="<?= $as['jrk_rumah_sekolah']; ?>"
                                            placeholder="jarak rumah ke sekolah">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>JURUSAN</label>
                                        <select name="jurusan" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option selected value="<?= $as['jurusan']; ?>"><?= $as['jurusan']; ?>
                                            </option>
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
                                            <option selected value="<?= $as['thn_akademik']; ?>">
                                                <?= $as['thn_akademik']; ?></option>
                                            <?php $tahun = mysqli_query($conn, "SELECT * FROM tahun_akademik"); ?>
                                            <?php while ($t = mysqli_fetch_assoc($tahun)) : ?>
                                            <option value="<?= $t['tahun']; ?>"><?= $t['tahun']; ?></option>
                                            <?php endwhile ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputFile">Foto Ijazah</label>
                                        <input value="<?= $as['fotoijazah']; ?>" name="fotoijazah" type="file"
                                            id="exampleInputFile">
                                        <input value="<?= $as['fotoijazah']; ?>" name="fotoijazahlama" type="hidden"
                                            id="exampleInputFile">

                                        <p style="color:red; font-style:italic;">*tipe gambar harus jpg,png,jpeg</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputFile">Foto skhun</label>
                                        <input value="<?= $as['fotoskhu']; ?>" name="fotoskhu" type="file"
                                            id="exampleInputFile">
                                        <input value="<?= $as['fotoskhu']; ?>" name="fotoskhulama" type="hidden"
                                            id="exampleInputFile">

                                        <p style="color:red; font-style:italic;">*tipe gambar harus jpg,png,jpeg</p>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputFile">Foto kk</label>
                                        <input value="<?= $as['fotokk']; ?>" name="fotokk" type="file"
                                            id="exampleInputFile">
                                        <input value="<?= $as['fotokk']; ?>" name="fotokklama" type="hidden"
                                            id="exampleInputFile">

                                        <p style="color:red; font-style:italic;">*tipe gambar harus jpg,png,jpeg</p>
                                    </div>
                                    <div class="col-xs-12">
                                        <label for="exampleInputFile">Foto </label>
                                        <input value="<?= $as['foto']; ?>" name="foto" type="file"
                                            id="exampleInputFile">
                                        <input value="<?= $as['foto']; ?>" name="fotolama" type="hidden"
                                            id="exampleInputFile">

                                        <p style="color:red; font-style:italic;">*tipe gambar harus jpg,png,jpeg</p>
                                    </div>



                                    <!-- ------------------------------------------------------------------------------------------------------------ -->

                                    <hr>
                                    <br>
                                    <p style="color:blue;font-size:16px;text-align: center;"><label
                                            for="exampleInputFile">BIODATA AYAH</label></p>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nama Ayah</label>
                                        <input type="text" name="namaayah" class="form-control" placeholder="nama ayah" value="<?= $as['namayah']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">tahun lahir Ayah</label>
                                        <input type="text" name="thnlahirayah" class="form-control"
                                            placeholder="tahun lahir ayah" value="<?= $as['thnlahirayah']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Pendidikan Ayah</label>
                                        <select name="pendidikanayah" class="form-control">
                                            <option value="">---silahkan pilih---</option>
                                            <option><?=$as['pendidikanayah']; ?></option>
                                            <option value="Tidak tamat SD">Tidak tamat SD</option>
                                            <option value="SD">SD</option>
                                            <option value="SMK">SMK</option>
                                            <option value="SMA">SMA</option>
                                            <option value="MTS">MTS</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Peghasilan Ayah</label>
                                        <input type="text" name="penghasilanayah" class="form-control"
                                            placeholder="Penghasilan ayah" value="<?= $as['penghasilanayah']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Pekerjaan Ayah</label>
                                        <input type="text" name="pekerjaanayah" class="form-control"
                                            placeholder="Pekerjaan ayah" value="<?= $as['pekerjaanayah']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nik Ayah</label>
                                        <input type="text" name="nikayah" class="form-control" placeholder="Nik ayah" value="<?= $as['nikayah']; ?>">
                                    </div>
                                    <br>
                                    <br>
                                    <p style="color:blue;font-size:16px;text-align: center;"><label
                                            for="exampleInputFile">BIODATA IBU</label></p>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nama Ibu</label>
                                        <input type="text" name="namaibu" class="form-control" placeholder="Nama Ibu" value="<?= $as['namaibu']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Tahun Lahir ibu</label>
                                        <input type="text" name="thnlhribu" class="form-control"
                                            placeholder="tahun lahir ibu" value="<?= $as['thnlahiribu']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Pendidikan Ibu</label>
                                        <select name="pendidikanibu" class="form-control">
                                            <option><?= $as['pendidikanibu']; ?></option>
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
                                        <input type="text" name="pekerjaanibu" class="form-control"
                                            placeholder="pekerjaan ibu" value="<?= $as['pekerjaanibu']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Penghasilan ibu</label>
                                        <input type="text" name="penghasilanibu" class="form-control"
                                            placeholder="penghasilan ibu" value="<?= $as['penghasilanibu']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nik ibu</label>
                                        <input type="text" name="nikibu" class="form-control" placeholder="Nik ibu" value="<?= $as['nikibu']; ?>">
                                    </div>
                                    <p style="color:blue;font-size:16px;text-align: center;"><label
                                            for="exampleInputFile">BIODATA WALI</label></p>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nama Wali</label>
                                        <input type="text" name="namawali" class="form-control" placeholder="Nama wali" value="<?= $as['namawali']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Tahun Lahir wali</label>
                                        <input type="text" name="thnlhrwali" class="form-control"
                                            placeholder="tahun lahir Wali" value="<?= $as['thnlahirwali']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Pendidikan Wali</label>
                                        <select name="pendidikanwali" class="form-control">
                                            <option><?= $as['pendidikanwali']; ?></option>
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
                                        <input type="text" name="pekerjaanwali" class="form-control"
                                            placeholder="pekerjaan Wali" value="<?= $as['pekerjaanwali']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Penghasilan Wali</label>
                                        <input type="text" name="penghasilanwali" class="form-control"
                                            placeholder="penghasilan ibu" value="<?= $as['penghasilanwali']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Nik Wali</label>
                                        <input type="text" name="nikwali" class="form-control" placeholder="Nik Wali" value="<?= $as['nikwali']; ?>">
                                    </div>

                                    <!-- passwordd -->
                                    <input type="hidden" name="password" class="form-control" placeholder=""
                                        value="<?= $as['password']; ?>">

                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="edit" class="btn btn-primary"><i
                                            class="fa fa-check-circle"> Simpan</i></button>
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