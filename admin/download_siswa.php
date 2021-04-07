<?php
include_once '../config/function.php';
$kelas   = $_GET['kelas'];
    $jurusan = $_GET['jurusan'];
    $tahun   = $_GET['tahun'];
 header("Content-type: aplication/vnd-ms-excel");
 header("Content-Disposition: attachment; filename= data siswa $kelas $tahun.xls");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $kelas   = $_GET['kelas'];
    $jurusan = $_GET['jurusan'];
    $tahun   = $_GET['tahun'];
    $hasil   = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = '$kelas' AND jurusan = '$jurusan' AND thn_akademik = '$tahun' ");
    $as      = mysqli_fetch_assoc($hasil);
    $jum     = mysqli_num_rows($hasil);
    ?>
    <h2>Data Siswa SMK Full Day Bustanul Ulum Bulugading</h2>
    Kelas : <?= $as['kelas']; ?> <br>
    jurusan :<?= $as['jurusan']; ?> <br>
    Tahnun Akademik : <?= $as['thn_akademik']; ?><br>
    jumlah siswa: <?= $jum; ?><br>
    <table border="1" cellpadding="15" cellspacing="0" >
        <tr>
        <th>No</th>
        <th>Nama</th>
        <th>nisn</th>
        <th>nipd</th>
        <th>jenis kelamin</th>
        <th>tempat lahir</th>
        <th>tanggal lahir</th>
        <th>nik</th>
        <th>agama</th>
        <th>alamat</th>
        <th>tr</th>
        <th>rw</th>
        <th>dusun</th>
        <th>kelurahan</th>
        <th>kecamatan</th>
        <th>kode pos</th>
        <th>jenis tinggal</th>
        <th>alat transpotasi</th>
        <th>no telpon</th>
        <th>no</th>
        <th>no skhun</th>
        <th>email</th>
        <th>penerima kps</th>
        <th>no kps</th>
        <th>nama ayah</th>
        <th>tahun lahir ayah</th>
        <th>pendidikan ayah</th>
        <th>pekerjaan ayah</th>
        <th>penghasilan ayah</th>
        <th>nik ayah</th>
        <th>nama ibu</th>
        <th>tahun lahir ibu</th>
        <th>pendidikan ibu</th>
        <th>pekerjaan ibu</th>
        <th>penghasilan ibu</th>
        <th>nik ibu</th>
        <th>nama wali</th>
        <th>tahun lahir wali</th>
        <th>pendidikan wali</th>
        <th>pekerjaan wali</th>
        <th>penghasilan wali</th>
        <th>nik wali</th>
        <th>kelas</th>
        <th>no UN</th>
        <th>no ijazah</th>
        <th>penerima kip</th>
        <th>nomor kip</th>
        <th>nama kip</th>
        <th>no kks</th>
        <th>no reg akta</th>
        <th>bank</th>
        <th>no rek bank</th>
        <th>rekening atas nama</th>
        <th>layak pip</th>
        <th>alasan layak pip</th>
        <th>kebutuhan</th>
        <th>asal sekolah</th>
        <th>anak ke</th>
        <th>lintang</th>
        <th>bujur</th>
        <th>no kk</th>
        <th>berat</th>
        <th>tinggi</th>
        <th>lingkar kepala</th>
        <th>jumlah saudara</th>
        <th>jarak rumah sekolah</th>
        <th>jurusan</th>
        <th>tahun akademik</th>
        </tr>
    <?php
    $no = 1;
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE kelas = '$kelas' AND jurusan = '$jurusan' AND thn_akademik = '$tahun' ");
    
     while ($s = mysqli_fetch_assoc($result) ) : ?>    
        <tr>
            <td><?= $no; ?></td>
            <td><?= $s['nama'] ?></td>
            <td><?= $s['nisn'] ?></td>
            <td><?= $s['nipd'] ?></td>
            <td><?= $s['jk'] ?></td>
            <td><?= $s['tmpt_lahir'] ?></td>
            <td><?= $s['tgl_lahir'] ?></td>
            <td><?= $s['nik'] ?></td>
            <td><?= $s['agama'] ?></td>
            <td><?= $s['alamat'] ?></td>
            <td><?= $s['rt'] ?></td>
            <td><?= $s['rw'] ?></td>
            <td><?= $s['dusun'] ?></td>
            <td><?= $s['kelurahan'] ?></td>
            <td><?= $s['kecamatan'] ?></td>
            <td><?= $s['kode_pos'] ?></td>
            <td><?= $s['jns_tinggal'] ?></td>
            <td><?= $s['alat_transport'] ?></td>
            <td><?= $s['telpon'] ?></td>
            <td><?= $s['hp'] ?></td>
            <td><?= $s['email'] ?></td>
            <td><?= $s['skhun'] ?></td>
            <td><?= $s['penerima_kps'] ?></td>
            <td><?= $s['nokps'] ?></td>
            <td><?= $s['namayah'] ?></td>
            <td><?= $s['thnlahirayah'] ?></td>
            <td><?= $s['pendidikanayah'] ?></td>
            <td><?= $s['pekerjaanayah'] ?></td>
            <td><?= $s['penghasilanayah'] ?></td>
            <td><?= $s['nikayah'] ?></td>
            <td><?= $s['namaibu'] ?></td>
            <td><?= $s['thnlahiribu'] ?></td>
            <td><?= $s['pendidikanibu'] ?></td>
            <td><?= $s['pekerjaanibu'] ?></td>
            <td><?= $s['penghasilanibu'] ?></td>
            <td><?= $s['nikibu'] ?></td>
            <td><?= $s['namawali'] ?></td>
            <td><?= $s['thnlahirwali'] ?></td>
            <td><?= $s['pendidikanwali'] ?></td>
            <td><?= $s['pekerjaanwali'] ?></td>
            <td><?= $s['penghasilanwali'] ?></td>
            <td><?= $s['nikwali'] ?></td>
            <td><?= $s['kelas'] ?></td>
            <td><?= $s['noun'] ?></td>
            <td><?= $s['noijazah'] ?></td>
            <td><?= $s['pnrma_kip'] ?></td>
            <td><?= $s['nomorkip'] ?></td>
            <td><?= $s['namakip'] ?></td>
            <td><?= $s['nokks'] ?></td>
            <td><?= $s['noreg_akta'] ?></td>
            <td><?= $s['bank'] ?></td>
            <td><?= $s['norek_bank'] ?></td>
            <td><?= $s['rek_an'] ?></td>
            <td><?= $s['layak_pip']; ?></td>
            <td><?= $s['alasan_lyk_pip']; ?></td>
            <td><?= $s['kebutuhan']; ?></td>
            <td><?= $s['asal_sekolah']; ?></td>
            <td><?= $s['anak_ke']; ?></td>
            <td><?= $s['lintang'] ?></td>
            <td><?= $s['bujur']; ?></td>
            <td><?= $s['nokk'] ?></td>
            <td><?= $s['berat'] ?></td>
            <td><?= $s['tinggi'] ?></td>
            <td><?= $s['lingkar_kpl'] ?></td>
            <td><?= $s['jrk_rumah_sekolah'] ?></td>
            <td><?= $s['lingkar_kpl'] ?></td>
            <td><?= $s['jurusan'] ?></td>
            <td><?= $s['thn_akademik'] ?></td>
        </tr>
    <?php
    $no++;
     endwhile ?>
    </table>
</body>

</html>