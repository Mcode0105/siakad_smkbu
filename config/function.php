<?php
$server   = "sql113.epizy.com";
$username = "epiz_24979459";
$password = "qmCOIv0Au7h";
$db       = "epiz_24979459_siakad";
$conn = mysqli_connect($server, $username, $password, $db);


function addadmin($post)
{
    global $conn;
    $username = $post['username'];
    $password = $post['password'];
    $password1 = $post['password1'];
    if ($password !== $password1) {
        echo  "<div class='alert alert-danger'role='alert'>
 konfirmasi pasword tidak sama
</div>";
        return false;
    }
    $created  = date("d-m-Y");
    $foto     = uploadfoto();
    $query    = "INSERT INTO admin VALUES ('','$username','$created','$password','$foto')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function uploadfoto()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function hapus_administrator($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM admin WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function addkelas($post)
{
    global $conn;
    $kelas = $post['kelas'];
    mysqli_query($conn, "INSERT INTO kelas VALUES('','$kelas')");
    return mysqli_affected_rows($conn);
}

function editkelas($post)
{
    global $conn;
    $id    = $post['id'];
    $kelas = $post['kelas'];
    mysqli_query($conn, "UPDATE kelas SET kelas = '$kelas' WHERE id= $id ");
    return mysqli_affected_rows($conn);
}

function hapus_kelas($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM kelas WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function addjurusan($post)
{
    global $conn;
    $jurusan = $post['jurusan'];
    mysqli_query($conn, "INSERT INTO jurusan VALUES ('','$jurusan') ");
    return mysqli_affected_rows($conn);
}

function edit_jurusan($post)
{
    global $conn;
    $jurusan    = $post['jurusan'];
    $id         = $post['id'];
    mysqli_query($conn, "UPDATE jurusan SET jurusan = '$jurusan' WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function addakademik($post)
{
    global $conn;
    $akademik = $post['akademik'];
    mysqli_query($conn, "INSERT INTO tahun_akademik VALUES ('','$akademik') ");
    return mysqli_affected_rows($conn);
}

function bulan()
{
    $b = date("m");
    if ($b == "01") {
        $b = "Januari";
    } elseif ($b == "02") {
        $b = "Februari";
    } elseif ($b == "03") {
        $b = "Maret";
    } elseif ($b == "04") {
        $b = "April";
    } elseif ($b == "05") {
        $b = "Mei";
    } elseif ($b == "06") {
        $b = "Juni";
    } elseif ($b == "07") {
        $b = "juli";
    } elseif ($b == "08") {
        $b = "Agustus";
    } elseif ($b == "09") {
        $b = "September";
    } elseif ($b == 10) {
        $b = "0ktober";
    } elseif ($b == 11) {
        $b = "November";
    } elseif ($b == 12) {
        $b = "Desember";
    }
    return $b;
}
function hari()
{
    $hari = date("l");
    if ($hari == 'Thursday') {
        $hari = 'kamis';
    } else if ($hari == 'Friday') {
        $hari = "jumat";
    } else if ($hari == 'Saturday') {
        $hari = "Sabtu";
    } elseif ($hari == "Sunday") {
        $hari = "Minggu";
    } else if ($hari == "Monday") {
        $hari = "Senin";
    } else if ($hari == "Tuesday") {
        $hari = "Selasa";
    } else if ($hari == "Wednesday") {
        $hari = "Rabu";
    }
    return $hari;
}

function ganti_password($post)
{
    global $conn;
    $id = $post['id'];
    $passwordlama = $post['passwordlama'];
    $passwordbaru = $post['passwordbaru'];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$id' ");
    $p    = mysqli_fetch_assoc($result);
    $pass = $p['password'];

    if ($passwordlama !== $pass) {
        echo "<script>
        alert('password lama tidak sesuai');
        </script>";
        return false;
    }
    mysqli_query($conn, "UPDATE admin SET password = '$passwordbaru' WHERE id = '$id' ");

    return mysqli_affected_rows($conn);
}


function siswa($post)
{
    global $conn;
    $nama                 = htmlspecialchars($post['nama']);
    $nisn                 = htmlspecialchars($post['nisn']);
    $tmp_lahir            = htmlspecialchars($post['tmp_lahir']);
    $nipd                 = htmlspecialchars($post['nipd']);
    $jk                   = htmlspecialchars($post['jk']);
    $tgl_lahir            = htmlspecialchars($post['tgl_lahir']);
    $nik                  = htmlspecialchars($post['nik']);
    $agama                = htmlspecialchars($post['agama']);
    $alamat               = htmlspecialchars($post['alamat']);
    $rt                   = htmlspecialchars($post['rt']);
    $rw                   = htmlspecialchars($post['rw']);
    $dusun                = htmlspecialchars($post['dusun']);
    $kelurahan            = htmlspecialchars($post['kelurahan']);
    $kecamatan            = htmlspecialchars($post['kecamatan']);
    $kodepos              = htmlspecialchars($post['kode_pos']);
    $jns_tinggal          = htmlspecialchars($post['jns_tinggal']);
    $alt_transport        = htmlspecialchars($post['alt_transport']);
    $telpon               = htmlspecialchars($post['telpon']);
    $hp                   = htmlspecialchars($post['hp']);
    $noskhun              = htmlspecialchars($post['noskhun']);
    $email                = htmlspecialchars($post['email']);
    $penerima_kps         = htmlspecialchars($post['penerima_kps']);
    $nokps                = htmlspecialchars($post['nokps']);
    $kelas                = htmlspecialchars($post['kelas']);
    $noun                 = htmlspecialchars($post['noun']);
    $noijazah             = htmlspecialchars($post['noijazah']);
    $pnrma_kip            = htmlspecialchars($post['pnrma_kip']);
    $nokip                = htmlspecialchars($post['nokip']);
    $namakip              = htmlspecialchars($post['namakip']);
    $nokks                = htmlspecialchars($post['nokks']);
    $noreg_akta           = htmlspecialchars($post['noreg_akta']);
    $bank                 = htmlspecialchars($post['bank']);
    $norek_bank           = htmlspecialchars($post['norek_bank']);
    $rek_an               = htmlspecialchars($post['rek_an']);
    $layak_pip            = htmlspecialchars($post['layak_pip']);
    $alasan_lyk_pip       = htmlspecialchars($post['alasan_layak_pip']);
    $kebutuhan            = htmlspecialchars($post['kebutuhan']);
    $asal_sekolah         = htmlspecialchars($post['asal_sekolah']);
    $anak_ke              = htmlspecialchars($post['anak_ke']);
    $lintang              = htmlspecialchars($post['lintang']);
    $bujur                = htmlspecialchars($post['bujur']);
    $nokk                 = htmlspecialchars($post['nokk']);
    $berat                = htmlspecialchars($post['berat']);
    $tinggi               = htmlspecialchars($post['tinggi']);
    $lingkar_kpl          = htmlspecialchars($post['lingkar_kpl']);
    $jmlh_saudara         = htmlspecialchars($post['jmlh_saudara']);
    $jrk_rumah_sekolah    = htmlspecialchars($post['jrk_rumah_sekolah']);
    $jurusan              = htmlspecialchars($post['jurusan']);
    $thn_akademik         = htmlspecialchars($post['thn_akademik']);
    $fotoijazah           = fotoijazah();
    $fotoskhun            = fotoskhun();
    $fotokk               = fotokk();
    $foto                 = foto();
    // ayahhh------------------------------
    $namaayah             = htmlspecialchars($post['namaayah']);
    $thnlahirayah         = htmlspecialchars($post['thnlahirayah']);
    $pendidikanayah       = htmlspecialchars($post['pendidikanayah']);
    $penghasilanayah      = htmlspecialchars($post['penghasilanayah']);
    $pekerjaanayah        = htmlspecialchars($post['pekerjaanayah']);
    $nikayah              = htmlspecialchars($post['nikayah']);
    // ibu---------------------------------------
    $namaibu              = htmlspecialchars($post['namaibu']);
    $thn_lahir_ibu        = htmlspecialchars($post['thnlhribu']);
    $pendidikanibu        = htmlspecialchars($post['pendidikanibu']);
    $penghasilanibu       = htmlspecialchars($post['penghasilanibu']);
    $pekerjaanibu         = htmlspecialchars($post['pekerjaanibu']);
    $nikibu               = htmlspecialchars($post['nikibu']);

    // wali----------------------------------------
    $namawali              = htmlspecialchars($post['namawali']);
    $thn_lahir_wali        = htmlspecialchars($post['thnlhrwali']);
    $pendidikanwali        = htmlspecialchars($post['pendidikanwali']);
    $penghasilanwali       = htmlspecialchars($post['penghasilanwali']);
    $pekerjaanwali         = htmlspecialchars($post['pekerjaanwali']);
    $nikwali               = htmlspecialchars($post['nikwali']);


    $query = "INSERT INTO siswa VALUES('','$nama','$nipd','$jk','$nisn','$tmp_lahir','$tgl_lahir','$nik','$agama','$alamat','$rt','$rw','$dusun', 
                                       '$kelurahan','$kecamatan','$kodepos','$jns_tinggal','$alt_transport','$telpon','$hp','$email',
                                       '$noskhun','$penerima_kps','$nokps','$namaayah','$thnlahirayah','$pendidikanayah',
                                       '$penghasilanayah','$pekerjaanayah','$nikayah','$namaibu','$thn_lahir_ibu','$pendidikanibu',
                                       '$penghasilanibu','$pekerjaanibu','$nikibu','$namawali','$thn_lahir_wali','$pendidikanwali','$penghasilanwali',
                                       '$pekerjaanwali','$nikwali','$kelas','$noun','$noijazah','$pnrma_kip',
                                       '$nokip','$namakip','$nokks','$noreg_akta','$bank','$norek_bank','$rek_an','$layak_pip',
                                       '$alasan_lyk_pip','$kebutuhan','$asal_sekolah','$anak_ke','$lintang','$bujur','$nokk',
                                       '$berat','$tinggi','$lingkar_kpl','$jmlh_saudara','$jrk_rumah_sekolah','$jurusan',
                                       '$fotoijazah','$fotoskhun','$fotokk','$foto','$thn_akademik','$nisn')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function fotoijazah()
{

    $namafoto        = $_FILES['fotoijazah']['name'];
    $ukuranfoto      = $_FILES['fotoijazah']['size'];
    $error           = $_FILES['fotoijazah']['error'];
    $tmpname         = $_FILES['fotoijazah']['tmp_name'];


    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar 
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img_ijazah/' . $namafoto);
    return $namafoto;
}

function fotoskhun()
{

    $namafoto        = $_FILES['fotoskhu']['name'];
    $ukuranfoto      = $_FILES['fotoskhu']['size'];
    $error           = $_FILES['fotoskhu']['error'];
    $tmpname         = $_FILES['fotoskhu']['tmp_name'];


    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img_skhun/' . $namafoto);
    return $namafoto;
}
function fotokk()
{

    $namafoto        = $_FILES['fotokk']['name'];
    $ukuranfoto      = $_FILES['fotokk']['size'];
    $error           = $_FILES['fotokk']['error'];
    $tmpname         = $_FILES['fotokk']['tmp_name'];


    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img_kk/' . $namafoto);
    return $namafoto;
}
function foto()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function list_siswa($post)
{
    global $conn;
    $kelas          = $post['kelas'];
    $jurusan        = $post['jurusan'];
    $tahun_akademik = $post['tahun_Akademik'];
    // insert ke database
    mysqli_query($conn, "INSERT INTO grup_siswa VALUES('','$kelas','$jurusan','$tahun_akademik')");
    return mysqli_affected_rows($conn);
}



function fotoguru()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];
    if ($error === 4) {
        echo  "<div class='alert alert-danger'role='alert'>
 anda belum mengisi foto anda
</div>";
    }

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function addguru($post)
{
    global $conn;
    $nama                   = htmlspecialchars($post['nama']);
    $nuptk                  = htmlspecialchars($post['nuptk']);
    $jk                     = htmlspecialchars($post['jk']);
    $tmp_lahir              = htmlspecialchars($post['tmp_lahir']);
    $tgl_lahir              = htmlspecialchars($post['tgl_lahir']);
    $status_pegawai         = htmlspecialchars($post['status_pegawai']);
    $agama                  = htmlspecialchars($post['agama']);
    $alamat                 = htmlspecialchars($post['alamat']);
    $rt                     = htmlspecialchars($post['rt']);
    $rw                     = htmlspecialchars($post['rw']);
    $dusun                  = htmlspecialchars($post['dusun']);
    $desa                   = htmlspecialchars($post['desa']);
    $kecamatan              = htmlspecialchars($post['kecamatan']);
    $kode_pos               = htmlspecialchars($post['kodepos']);
    $tlp                    = htmlspecialchars($post['tlp']);
    $hp                     = htmlspecialchars($post['hp']);
    $email                  = htmlspecialchars($post['email']);
    $sk_pengangkatan        = htmlspecialchars($post['sk_pengangkatan']);
    $tmt_pengangkatan       = htmlspecialchars($post['tmt_pengangkatan']);
    $kwrg                   = htmlspecialchars($post['kwrg']);
    $nik                    = htmlspecialchars($post['nik']);
    $nokk                   = htmlspecialchars($post['nokk']);
    $foto                   = fotoguru();
    $ijazah                 = upload_file_guru();
    $transkip                 = upload_file_guru();
    $query                  = "INSERT INTO guru VALUES('','$nama','$nuptk','$jk','$tmp_lahir','$tgl_lahir','$status_pegawai',
                                '$agama','$alamat','$rt','$rw','$dusun','$desa','$kecamatan','$kode_pos','$tlp',
                                '$hp','$email','$sk_pengangkatan','$tmt_pengangkatan','$kwrg','$nik','$nokk','12345678','$ijazah','$transkip','$foto')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ganti_password_siswa($post)
{
    global $conn;
    $id           = $post['id'];
    $passwordlama = $post['passwordlama'];
    $passwordbaru = $post['passwordbaru'];

    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = '$id' ");
    $p    = mysqli_fetch_assoc($result);
    $pass = $p['password'];

    if ($passwordlama !== $pass) {
        echo "<script>
        alert('password lama tidak sesuai');
        </script>";
        return false;
    }
    mysqli_query($conn, "UPDATE siswa SET password = '$passwordbaru' WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function editsiswa($post)
{
    global $conn;
    $id                   = $post['id'];
    $nama                 = htmlspecialchars($post['nama']);
    $nisn                 = htmlspecialchars($post['nisn']);
    $tmp_lahir            = htmlspecialchars($post['tmp_lahir']);
    $nipd                 = htmlspecialchars($post['nipd']);
    $jk                   = htmlspecialchars($post['jk']);
    $tgl_lahir            = htmlspecialchars($post['tgl_lahir']);
    $nik                  = htmlspecialchars($post['nik']);
    $agama                = htmlspecialchars($post['agama']);
    $alamat               = htmlspecialchars($post['alamat']);
    $rt                   = htmlspecialchars($post['rt']);
    $rw                   = htmlspecialchars($post['rw']);
    $dusun                = htmlspecialchars($post['dusun']);
    $kelurahan            = htmlspecialchars($post['kelurahan']);
    $kecamatan            = htmlspecialchars($post['kecamatan']);
    $kodepos              = htmlspecialchars($post['kode_pos']);
    $jns_tinggal          = htmlspecialchars($post['jns_tinggal']);
    $alt_transport        = htmlspecialchars($post['alat_transport']);
    $telpon               = htmlspecialchars($post['telpon']);
    $hp                   = htmlspecialchars($post['hp']);
    $noskhun              = htmlspecialchars($post['noskhun']);
    $email                = htmlspecialchars($post['email']);
    $penerima_kps         = htmlspecialchars($post['penerima_kps']);
    $nokps                = htmlspecialchars($post['nokps']);
    $kelas                = htmlspecialchars($post['kelas']);
    $noun                 = htmlspecialchars($post['noun']);
    $noijazah             = htmlspecialchars($post['noijazah']);
    $pnrma_kip            = htmlspecialchars($post['pnrma_kip']);
    $nokip                = htmlspecialchars($post['nokip']);
    $namakip              = htmlspecialchars($post['namakip']);
    $nokks                = htmlspecialchars($post['nokks']);
    $noreg_akta           = htmlspecialchars($post['noreg_akta']);
    $bank                 = htmlspecialchars($post['bank']);
    $norek_bank           = htmlspecialchars($post['norek_bank']);
    $rek_an               = htmlspecialchars($post['rek_an']);
    $layak_pip            = htmlspecialchars($post['layak_pip']);
    $alasan_lyk_pip       = htmlspecialchars($post['alasan_layak_pip']);
    $kebutuhan            = htmlspecialchars($post['kebutuhan']);
    $asal_sekolah         = htmlspecialchars($post['asal_sekolah']);
    $anak_ke              = htmlspecialchars($post['anak_ke']);
    $lintang              = htmlspecialchars($post['lintang']);
    $bujur                = htmlspecialchars($post['bujur']);
    $nokk                 = htmlspecialchars($post['nokk']);
    $berat                = htmlspecialchars($post['berat']);
    $tinggi               = htmlspecialchars($post['tinggi']);
    $lingkar_kpl          = htmlspecialchars($post['lingkar_kpl']);
    $jmlh_saudara         = htmlspecialchars($post['jmlh_saudara']);
    $jrk_rumah_sekolah    = htmlspecialchars($post['jrk_rumah_sekolah']);
    $jurusan              = htmlspecialchars($post['jurusan']);
    $thn_akademik         = htmlspecialchars($post['thn_akademik']);
    $fotoijazahlama       = $post['fotoijazahlama'];
    $fotoskhulama         = $post['fotoskhulama'];
    $fotokklama           = $post['fotokklama'];
    $fotolama             = $post['fotolama'];
    if ($_FILES['fotoijazah']['error'] === 4) {
        $fotoijazah    = $fotoijazahlama;
    } else {
        $fotoijazah    = fotoijazah();
    }
    if ($_FILES['fotoskhu']['error'] === 4) {
        $fotoskhu    = $fotoskhulama;
    } else {
        $fotoskhu    = fotoskhun();
    }
    if ($_FILES['fotokk']['error'] === 4) {
        $fotokk    = $fotokklama;
    } else {
        $fotokk    = fotokk();
    }
    if ($_FILES['foto']['error'] === 4) {
        $foto    = $fotolama;
    } else {
        $foto    = foto();
    }

    // ayahhh------------------------------
    $namaayah             = htmlspecialchars($post['namaayah']);
    $thnlahirayah         = htmlspecialchars($post['thnlahirayah']);
    $pendidikanayah       = htmlspecialchars($post['pendidikanayah']);
    $penghasilanayah      = htmlspecialchars($post['penghasilanayah']);
    $pekerjaanayah        = htmlspecialchars($post['pekerjaanayah']);
    $nikayah              = htmlspecialchars($post['nikayah']);
    // ibu---------------------------------------
    $namaibu              = htmlspecialchars($post['namaibu']);
    $thn_lahir_ibu        = htmlspecialchars($post['thnlhribu']);
    $pendidikanibu        = htmlspecialchars($post['pendidikanibu']);
    $penghasilanibu       = htmlspecialchars($post['penghasilanibu']);
    $pekerjaanibu         = htmlspecialchars($post['pekerjaanibu']);
    $nikibu               = htmlspecialchars($post['nikibu']);

    // wali----------------------------------------
    $namawali              = htmlspecialchars($post['namawali']);
    $thn_lahir_wali        = htmlspecialchars($post['thnlhrwali']);
    $pendidikanwali        = htmlspecialchars($post['pendidikanwali']);
    $penghasilanwali       = htmlspecialchars($post['penghasilanwali']);
    $pekerjaanwali         = htmlspecialchars($post['pekerjaanwali']);
    $nikwali               = htmlspecialchars($post['nikwali']);
    $password              = htmlspecialchars($post['password']);


    // $query ="UPDATE  siswa SET  
    // nama                ='$nama',
    // nipd                ='$nipd',
    // jk                  ='$jk',
    // nisn                ='$nisn',
    // tmpt_lahir          ='$tmp_lahir',
    // tgl_lahir           ='$tgl_lahir',
    // nik                 ='$nik',
    // agama               ='$agama',
    // alamat              ='$alamat',
    // rt                  ='$rt',
    // rw                  ='$rw',
    // dusun               ='$dusun', 
    // kelurahan           ='$kelurahan',
    // kecamatan           ='$kecamatan',
    // kode_pos            ='$kodepos', 
    // jns_tinggal         ='$jns_tinggal',
    // alat_transport      ='$alt_transport',
    // telpon              ='$telpon',
    // hp                  ='$hp',
    // email               ='$email',
    //  skhun              ='$noskhun',
    //  penerima_kps       ='$penerima_kps',
    //  nokps              ='$nokps',
    //  namaayah           ='$namaayah',
    //  thnlahirayah       ='$thnlahirayah',
    //  pendidikanayah     ='$pendidikanayah',
    //  pekerjaanayah      ='$pekerjaanayah', 
    //  penghasilanayah    ='$penghasilanayah', 
    //  nikayah            ='$nikayah',
    //  namaibu            ='$namaibu',
    //  thnlahiribu        ='$thn_lahir_ibu',
    //  pendidikanibu      ='$pendidikanibu',
    //  pekerjaanibu       ='$pekerjaanibu',
    //  penghasilanibu     ='$penghasilanibu',
    //  nikibu             ='$nikibu',
    //  namawali           ='$namawali',
    //  thnlahirwali       ='$thn_lahir_wali',
    //  pendidikanwali     ='$pendidikanwali',
    //  pekerjaanwali      ='$pekerjaanwali', 
    //  penghasilanwali    ='$penghasilanwali',
    //  nikwali            ='$nikwali',
    //  kelas              ='$kelas',
    //  noun               ='$noun',
    //  noijazah           = $noijazah',
    //  pnrma_kip          ='$pnrma_kip',
    //  nomorkip           ='$nokip',
    //  namakip            ='$namakip',
    //  nokks              ='$nokks',
    // noreg_akta          ='$noreg_akta',
    // bank                ='$bank',
    // norek_bank          ='$norek_bank',
    // rek_an              ='$rek_an',
    // layak_pip           ='$layak_pip',
    // alasan_lyk_pip      ='$alasan_lyk_pip',
    // kebutuhan           ='$kebutuhan',
    // asal_sekolah        ='$asal_sekolah',
    // anak_ke             ='$anak_ke',
    // lintang             ='$lintang',
    // bujur               ='$bujur',
    // nokk                ='$nokk',
    // berat               ='$berat',
    // tinggi              ='$tinggi',
    // lingkar_kpl         ='$lingkar_kpl',
    // jml_saudara         ='$jmlh_saudara',
    // jrk_rumah_sekolah   ='$jrk_rumah_sekolah',
    // jurusan             ='$jurusan',
    // fotoijazah          ='$fotoijazah',
    // fotoskhu            ='$fotoskhu',
    // fotokk              ='$fotokk',
    // foto                ='$foto', 
    // thn_akademik        ='$thn_akademik',
    // passsword           ='$password'
    //                     WHERE id = $id ";
    $query = "UPDATE  siswa SET  nama = '$nama',
    nipd                = '$nipd',
    jk                  = '$jk',
    nisn                = '$nisn',
    tmpt_lahir          = '$tmp_lahir',
    tgl_lahir           = '$tgl_lahir',
    nik                 = '$nik',
    agama               = '$agama',
    alamat              = '$alamat',
    rt                  = '$rt',
    rw                  = '$rw',
    dusun               = '$dusun',
    kelurahan           = '$kelurahan',
    kecamatan           = '$kecamatan',
    kode_pos            = '$kodepos',
    jns_tinggal         = '$jns_tinggal',
    alat_transport      = '$alt_transport',
    telpon              = '$telpon',
    hp                  = '$hp',
    email               = '$email',
    skhun               = '$noskhun',
    penerima_kps         = '$penerima_kps',
    nokps               = '$nokps',
    namayah             = '$namaayah',
    thnlahirayah       ='$thnlahirayah',
     pendidikanayah     ='$pendidikanayah',
     pekerjaanayah      ='$pekerjaanayah', 
     penghasilanayah    ='$penghasilanayah', 
     nikayah            ='$nikayah',
      namaibu            ='$namaibu',
     thnlahiribu        ='$thn_lahir_ibu',
     pendidikanibu      ='$pendidikanibu',
    pekerjaanibu       ='$pekerjaanibu',
    penghasilanibu     ='$penghasilanibu',
    nikibu             ='$nikibu',
    namawali           ='$namawali',
    thnlahirwali       ='$thn_lahir_wali',
     pendidikanwali     ='$pendidikanwali',
     pekerjaanwali      ='$pekerjaanwali', 
     penghasilanwali    ='$penghasilanwali',
    nikwali            ='$nikwali',
    kelas              ='$kelas',
  noun               ='$noun',
  noijazah           = '$noijazah',
  pnrma_kip          ='$pnrma_kip',
  nomorkip           ='$nokip',
  namakip            ='$namakip',
  nokks              ='$nokks',
 noreg_akta          ='$noreg_akta',
 bank                ='$bank',
 norek_bank          ='$norek_bank',
 rek_an              ='$rek_an',
 layak_pip           ='$layak_pip',
 alasan_lyk_pip      ='$alasan_lyk_pip',
 kebutuhan           ='$kebutuhan',
 asal_sekolah        ='$asal_sekolah',
 anak_ke             ='$anak_ke',
 lintang             ='$lintang',
 bujur               ='$bujur',
 nokk                ='$nokk',
 berat               ='$berat',
 tinggi              ='$tinggi',
 lingkar_kpl         ='$lingkar_kpl',
 jml_saudara         ='$jmlh_saudara',
 jrk_rumah_sekolah   ='$jrk_rumah_sekolah',
 jurusan             ='$jurusan',
 fotoijazah          ='$fotoijazah',
 fotoskhu            ='$fotoskhu',
 fotokk              ='$fotokk',
 foto                ='$foto',
 thn_akademik        ='$thn_akademik',
 password            = '$password'
    
     WHERE id = $id ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function absen($post)
{
    global $conn;
    $nisn       = $post['nisn'];
    $kelas       = $post['kelas'];
    $nama       = $post['nama'];
    $semester   = $post['semester'];
    $bulan      = $post['bulan'];
    $tahun      = $post['tahun'];
    $alfasiang  = $post['alfasiang'];
    $alfapagi   = $post['alfapagi'];
    $izinpagi   = $post['izinpagi'];
    $izinsiang  = $post['izinsiang'];
    $sakitpagi  = $post['sakitpagi'];
    $sakitsiang = $post['sakitsiang'];


    mysqli_query($conn, "INSERT INTO rekap_absen VALUES ('','$nama','$nisn','$kelas',
    '$semester',
    '$bulan',
    '$tahun',
    '$alfapagi',
    '$alfasiang',
    '$izinpagi',
    '$izinsiang',
    '$sakitpagi',
    '$sakitsiang',
    '',
    '',
    '',
    '',
    '',
    '')");
    return mysqli_affected_rows($conn);
}

function hitung($post)
{
    global $conn;
    $nisn = $post['nisn'];
    $jmlalfapagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(alfapagi) AS jml1 FROM rekap_absen WHERE nisn = '$nisn'"));
    $jmlalfasiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(alfasiang)  AS jml2 FROM rekap_absen WHERE nisn = '$nisn'"));
    $jmlizinpagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(izinpagi)  AS jml3 FROM rekap_absen WHERE nisn = '$nisn'"));
    $jmlizinsiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT  SUM(izinsiang)  AS jml4 FROM rekap_absen WHERE nisn = '$nisn'"));
    $jmlsakitpagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(sakitpagi)  AS jml5 FROM rekap_absen WHERE nisn = '$nisn'"));
    $jmlsakitsiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(sakitsiang)  AS jml6 FROM rekap_absen WHERE nisn = '$nisn'"));

    $jmlalfapagi = $jmlalfapagi1['jml1'];
    $jmlalfasiang = $jmlalfasiang1['jml2'];
    $jmlizinpagi = $jmlizinpagi1['jml3'];
    $jmlizinsiang = $jmlizinsiang1['jml4'];
    $jmlsakitpagi = $jmlsakitpagi1['jml5'];
    $jmlsakitsiang = $jmlsakitsiang1['jml6'];

    mysqli_query($conn, "UPDATE rekap_absen SET 
    jml_alfa_pagi  = '$jmlalfapagi',
    jml_alfa_siang = '$jmlalfasiang',
    jml_izin_pagi  = '$jmlizinpagi',
    jml_izin_siang = '$jmlizinsiang',
    jml_sakit_pagi = '$jmlsakitpagi',
    jml_sakit_siang ='$jmlsakitsiang'
    WHERE nisn = '$nisn'
     ");
    return mysqli_affected_rows($conn);
}

function edit_absen($post)
{
    global $conn;
    $id         = $post['id'];
    $nisn       = $post['nisn'];
    $nama       = $post['nama'];
    $kelas      = $post['kelas'];
    $semester   = $post['semester'];
    $bulan      = $post['bulan'];
    $tahun      = $post['tahun'];
    $alfasiang  = $post['alfasiang'];
    $alfapagi   = $post['alfapagi'];
    $izinpagi   = $post['izinpagi'];
    $izinsiang  = $post['izinsiang'];
    $sakitpagi  = $post['sakitpagi'];
    $sakitsiang = $post['sakitsiang'];

    mysqli_query($conn, "UPDATE rekap_absen SET 
    kelas       ='$kelas',    
    alfapagi    = '$alfapagi',
    alfasiang   = '$alfasiang',
    izinpagi    = '$izinpagi',
    izinsiang   = '$izinsiang',
    sakitpagi   = '$sakitpagi',
    sakitsiang  = '$sakitsiang'
    WHERE id = $id
    ");

    hitung($post);

    return mysqli_affected_rows($conn);
}

function walikelas($post)
{
    global $conn;
    $nama       = $post['nama'];
    $nuptk      = $post['nuptk'];
    $tgl_lahir  = $post['tgl_lahir'];
    $kelas      = $post['kelas'];
    $email      = $post['email'];
    $password   = $post['password'];
    $foto       = foto();

    mysqli_query($conn, "INSERT INTO wali_kelas VALUES('','$nama','$nuptk','$tgl_lahir','$kelas','$email','$password','$foto')");
    return mysqli_affected_rows($conn);
}

function hapus_walikelas($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM wali_kelas WHERE id = $id ");
    return mysqli_affected_rows($conn);
}

function profilsekolah($post)
{
    global $conn;
    $nama = $post['nama'];
    $npsn = $post['npsn'];
    $pendidikan = $post['pendidikan'];
    $status     = $post['status'];
    $alamat     = $post['alamat'];
    $rt         = $post['rt'];
    $rw         = $post['rw'];
    $kodepos    = $post['kodepos'];
    $kelurahan  = $post['kelurahan'];
    $kecamatan  = $post['kecamatan'];
    $kabupaten  = $post['kabupaten'];
    $provinsi   = $post['provinsi'];
    $kepala_sekolah = $post['kepala_sekolah'];
    $no         = $post['no'];
    $email      = $post['email'];
    $website    = $post['website'];
    $akreditasi = $post['akreditasi'];
    $logo       = uploadfoto();
    mysqli_query($conn, "INSERT INTO profil_sekolah VALUES ('','$nama','$npsn','$pendidikan','$status','$alamat','$rt','$rw','$kodepos','$kelurahan','$kecamatan','$kabupaten','$provinsi','$kepala_sekolah','$no','$email','$website','$akreditasi','$logo') ");
    return mysqli_affected_rows($conn);
}

function editprofilsekolah($post)
{
    global $conn;
    $id = $post['id'];
    $nama = $post['nama'];
    $npsn = $post['npsn'];
    $pendidikan = $post['pendidikan'];
    $status     = $post['status'];
    $alamat     = $post['alamat'];
    $rt         = $post['rt'];
    $rw         = $post['rw'];
    $kodepos    = $post['kodepos'];
    $kelurahan  = $post['kelurahan'];
    $kecamatan  = $post['kecamatan'];
    $kabupaten  = $post['kabupaten'];
    $provinsi   = $post['provinsi'];
    $kepala_sekolah = $post['kepala_sekolah'];
    $no         = $post['no'];
    $email      = $post['email'];
    $website    = $post['website'];
    $akreditasi = $post['akreditasi'];
    $fotolama   = $post['fotolama'];
    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotolama;
    } else {
        $foto = uploadfoto();
    }

    $query = "UPDATE profil_sekolah SET 
    nama = '$nama', 
    npsn = '$npsn',
    jenis = '$pendidikan',
    status = '$status',
    alamat = '$alamat',
    rt     = '$rt',
    rw     = '$rw',
    kodepos = '$kodepos',
    kelurahan = '$kelurahan',
    kecamatan = '$kecamatan',
    kabupaten = '$kabupaten',
    provinsi = '$provinsi',
    kepalasekolah = '$kepala_sekolah',
    nohp = '$no',
    email = '$email',
    website = '$website',
    logo = '$foto'  
    WHERE id = $id ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function addsuratmasuk($post)
{
    global $conn;
    $nama       = $post['nama'];
    $no         = $post['no'];
    $tgl        = $post['tgl'];
    $keterangan = $post['keterangan'];
    $file       = uploadsurat();

    $query = "INSERT INTO surat_masuk VALUES ('','$nama','$no','$keterangan','$tgl','$file')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function addsuratkeluar($post)
{
    global $conn;
    $nama       = $post['nama'];
    $no         = $post['no'];
    $tgl        = $post['tgl'];
    $keterangan = $post['keterangan'];
    $file       = uploadsurat();

    $query = "INSERT INTO surat_keluar VALUES ('','$nama','$no','$keterangan','$tgl','$file')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}
function uploadsurat()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'xlsx', 'xls', 'doc'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan gambar
</div>";
        return false;
    }

    if ($ukuranfoto > 100000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function editguru($post)
{
    global $conn;
    $id                     = $post['id'];
    $nama                   = htmlspecialchars($post['nama']);
    $nuptk                  = htmlspecialchars($post['nuptk']);
    $jk                     = htmlspecialchars($post['jk']);
    $tmp_lahir              = htmlspecialchars($post['tmp_lahir']);
    $tgl_lahir              = htmlspecialchars($post['tgl_lahir']);
    $status_pegawai         = htmlspecialchars($post['status_pegawai']);
    $agama                  = htmlspecialchars($post['agama']);
    $alamat                 = htmlspecialchars($post['alamat']);
    $rt                     = htmlspecialchars($post['rt']);
    $rw                     = htmlspecialchars($post['rw']);
    $dusun                  = htmlspecialchars($post['dusun']);
    $desa                   = htmlspecialchars($post['desa']);
    $kecamatan              = htmlspecialchars($post['kecamatan']);
    $kode_pos               = htmlspecialchars($post['kodepos']);
    $tlp                    = htmlspecialchars($post['tlp']);
    $hp                     = htmlspecialchars($post['hp']);
    $email                  = htmlspecialchars($post['email']);
    $kwrg                   = htmlspecialchars($post['kwrg']);
    $nik                    = htmlspecialchars($post['nik']);
    $nokk                   = htmlspecialchars($post['nokk']);
    $ijazahlama              = $post['ijazahlama'];
    $transkiplama           = $post['transkiplama'];
    $fotolama               = $post['fotolama'];
    if ($_FILES['ijazah']['error'] == 4) {
        $ijazah = $ijazahlama;
    } else {
        $ijazah = ijazah_guru();
    }

    if ($_FILES['transkip']['error'] == 4) {
        $transkip = $transkiplama;
    } else {
        $transkip = transkip_guru();
    }

    if ($_FILES['foto']['error'] == 4) {
        $foto = $fotolama;
    } else {
        $foto = fotoguru();
    }

    $query = "UPDATE guru SET 
    nama        = '$nama',
    nuptk       = '$nuptk',
    jk          = '$jk',
    tmp_lahir   = '$tmp_lahir',
    tgl_lahir         = '$tgl_lahir',
    status_pegawai = '$status_pegawai',
    agama       = '$agama',
    alamat      = '$alamat',
    rt          = '$rt',
    rw          = '$rw',
    dusun       = '$dusun',
    desa        = '$desa',
    kecamatan   = '$kecamatan',
    kode_pos    = '$kode_pos',
    tlp         = '$tlp',
    hp          = '$hp',
    email       = '$email',
    kwrg                    = '$kwrg',
    nik         = '$nik',
    nokk        = '$nokk',
    password    = '12345678',
    ijazah      = '$ijazah',
    transkip    = '$transkip',
    foto        = '$foto'
    WHERE id = $id ";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function ganti_password_wk($post)
{
    global $conn;
    $id           = $post['id'];
    $passwordlama = $post['passwordlama'];
    $passwordbaru = $post['passwordbaru'];

    $result = mysqli_query($conn, "SELECT * FROM wali_kelas WHERE id = '$id' ");
    $p    = mysqli_fetch_assoc($result);
    $pass = $p['password'];

    if ($passwordlama !== $pass) {
        echo "<script>
        alert('password lama tidak sesuai');
        </script>";
        return false;
    }
    mysqli_query($conn, "UPDATE wali_kelas SET password = '$passwordbaru' WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function absenganjil($post)
{
    global $conn;
    $nisn       = $post['nisn'];
    $kelas      = $post['kelas'];
    $nama       = $post['nama'];
    $semester   = $post['semester'];
    $bulan      = $post['bulan'];
    $tahun      = $post['tahun'];
    $alfasiang  = $post['alfasiang'];
    $alfapagi   = $post['alfapagi'];
    $izinpagi   = $post['izinpagi'];
    $izinsiang  = $post['izinsiang'];
    $sakitpagi  = $post['sakitpagi'];
    $sakitsiang = $post['sakitsiang'];


    mysqli_query($conn, "INSERT INTO rekap_absen_ganjil VALUES ('','$nama','$nisn','$kelas',
    '$semester',
    '$bulan',
    '$tahun',
    '$alfapagi',
    '$alfasiang',
    '$izinpagi',
    '$izinsiang',
    '$sakitpagi',
    '$sakitsiang',
    '',
    '',
    '',
    '',
    '',
    '')");
    return mysqli_affected_rows($conn);
}

function hitungganjil($post)
{
    global $conn;
    $nisn = $post['nisn'];
    $jmlalfapagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(alfapagi) AS jml1 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));
    $jmlalfasiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(alfasiang)  AS jml2 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));
    $jmlizinpagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(izinpagi)  AS jml3 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));
    $jmlizinsiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT  SUM(izinsiang)  AS jml4 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));
    $jmlsakitpagi1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(sakitpagi)  AS jml5 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));
    $jmlsakitsiang1 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(sakitsiang)  AS jml6 FROM rekap_absen_ganjil WHERE nisn = '$nisn'"));

    $jmlalfapagi = $jmlalfapagi1['jml1'];
    $jmlalfasiang = $jmlalfasiang1['jml2'];
    $jmlizinpagi = $jmlizinpagi1['jml3'];
    $jmlizinsiang = $jmlizinsiang1['jml4'];
    $jmlsakitpagi = $jmlsakitpagi1['jml5'];
    $jmlsakitsiang = $jmlsakitsiang1['jml6'];

    mysqli_query($conn, "UPDATE rekap_absen_ganjil SET 
    jml_alfa_pagi  = '$jmlalfapagi',
    jml_alfa_siang = '$jmlalfasiang',
    jml_izin_pagi  = '$jmlizinpagi',
    jml_izin_siang = '$jmlizinsiang',
    jml_sakit_pagi = '$jmlsakitpagi',
    jml_sakit_siang ='$jmlsakitsiang'
    WHERE nisn = '$nisn'
     ");
    return mysqli_affected_rows($conn);
}

function edit_absen_ganjil($post)
{
    global $conn;
    $id         = $post['id'];
    $nisn       = $post['nisn'];
    $nama       = $post['nama'];
    $kelas      = $post['kelas'];
    $semester   = $post['semester'];
    $bulan      = $post['bulan'];
    $tahun      = $post['tahun'];
    $alfasiang  = $post['alfasiang'];
    $alfapagi   = $post['alfapagi'];
    $izinpagi   = $post['izinpagi'];
    $izinsiang  = $post['izinsiang'];
    $sakitpagi  = $post['sakitpagi'];
    $sakitsiang = $post['sakitsiang'];

    mysqli_query($conn, "UPDATE rekap_absen_ganjil SET 
    kelas       = '$kelas',    
    alfapagi    = '$alfapagi',
    alfasiang   = '$alfasiang',
    izinpagi    = '$izinpagi',
    izinsiang   = '$izinsiang',
    sakitpagi   = '$sakitpagi',
    sakitsiang  = '$sakitsiang'
    WHERE id = $id
    ");

    hitungganjil($post);

    return mysqli_affected_rows($conn);
}

function list_ganjil($post)
{
    global $conn;
    $semester = $post['semester'];
    $tahun    = $post['tahun_akademik'];

    mysqli_query($conn, "INSERT INTO list_absen_ganjil VALUES('','','$semester','$tahun') ");
    return mysqli_affected_rows($conn);
}
function list_genap($post)
{
    global $conn;
    $semester = $post['semester'];
    $tahun    = $post['tahun_akademik'];

    mysqli_query($conn, "INSERT INTO list_absen_genap VALUES('','','$semester','$tahun') ");
    return mysqli_affected_rows($conn);
}

function addkalender($post)
{
    global $conn;
    $tahun = $post['tahun'];
    $file  = uploadfotokalender();
    mysqli_query($conn, "INSERT INTO kalender_pendidikan VALUES('','$tahun','$file') ");
    return mysqli_affected_rows($conn);
}

function uploadfotokalender()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'xlsx', 'xls', 'doc'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan file
</div>";
        return false;
    }

    if ($ukuranfoto > 3000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function ganti_password_guru($post)
{
    global $conn;
    $id           = $post['id'];
    $passwordlama = $post['passwordlama'];
    $passwordbaru = $post['passwordbaru'];

    $result = mysqli_query($conn, "SELECT * FROM guru WHERE id = '$id' ");
    $p    = mysqli_fetch_assoc($result);
    $pass = $p['password'];

    if ($passwordlama !== $pass) {
        echo "<script>
        alert('password lama tidak sesuai');
        </script>";
        return false;
    }
    mysqli_query($conn, "UPDATE guru SET password = '$passwordbaru' WHERE id = $id ");

    return mysqli_affected_rows($conn);
}

function kepala_sekolah($post)
{
    global $conn;
    $nama = $post['nama'];
    $tgl_lahir = $post['tgl_lahir'];
    $nuptk  = $post['nuptk'];
    $tahun  = $post['tahun'];
    $pendidikan = $post['pendidikan'];
    $foto = uploadfoto();

    mysqli_query($conn, "INSERT INTO kepala_sekolah VALUES ('','$nama','$tgl_lahir','$nuptk','$tahun','$pendidikan','$foto') ");
    return mysqli_affected_rows($conn);
}

function addkeuangan($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $bulan = $post['bulan'];
    $file  = uploadallfile();
    mysqli_query($conn, "INSERT INTO keuangan VALUES ('','$tgl','$bulan','$file') ");
    return mysqli_affected_rows($conn);
}

function uploadallfile()
{

    $namafoto        = $_FILES['foto']['name'];
    $ukuranfoto      = $_FILES['foto']['size'];
    $error           = $_FILES['foto']['error'];
    $tmpname         = $_FILES['foto']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'xlsx', 'xls', 'docx'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan file
</div>";
        return false;
    }

    if ($ukuranfoto > 10000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/img/' . $namafoto);
    return $namafoto;
}

function ijazah_guru()
{

    $namafoto        = $_FILES['ijazah']['name'];
    $ukuranfoto      = $_FILES['ijazah']['size'];
    $error           = $_FILES['ijazah']['error'];
    $tmpname         = $_FILES['ijazah']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'xlsx', 'xls', 'docx'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan file
</div>";
        return false;
    }

    if ($ukuranfoto > 10000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/file_guru/' . $namafoto);
    return $namafoto;
}

function transkip_guru()
{

    $namafoto        = $_FILES['transkip']['name'];
    $ukuranfoto      = $_FILES['transkip']['size'];
    $error           = $_FILES['transkip']['error'];
    $tmpname         = $_FILES['transkip']['tmp_name'];

    $extensivalid = ['png', 'jpg', 'jpeg', 'pdf', 'docx', 'xlsx', 'xls', 'docx'];
    $extensigambar  = explode('.', $namafoto);
    $extensigambar  = strtolower(end($extensigambar));
    if (!in_array($extensigambar, $extensivalid)) {
        echo  "<div class='alert alert-warning'role='alert'>
yg anda isi bukan file
</div>";
        return false;
    }

    if ($ukuranfoto > 10000000) {
        echo  "<div class='alert alert-warning'role='alert'>
 ukuran foto terlalu besar
</div>";
        return false;
    }

    move_uploaded_file($tmpname, '../admin/file_guru/' . $namafoto);
    return $namafoto;
}

function addmapel($post)
{
    global $conn;
    $nama = $post['nama'];
    mysqli_query($conn, "INSERT INTO mapel VALUES ('','$nama')");
    return mysqli_affected_rows($conn);
}

function addketerangan($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $kepada = $post['kepada'];
    $no     = $post['no'];
    $keterangan = $post['keterangan'];
    $file = uploadallfile();
    mysqli_query($conn, "INSERT INTO keterangan VALUES('','$tgl','$no','$keterangan','$file','$kepada') ");
    return mysqli_affected_rows($conn);
}

function addjadwal($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $file = uploadallfile();
    mysqli_query($conn, "INSERT INTO jadwal VALUES('','$tgl','$file')");
    return mysqli_affected_rows($conn);
}

function addkttb($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $file = uploadallfile();
    mysqli_query($conn, "INSERT INTO kriteria_ketutasan_belajar VALUES('','$tgl','$file')");
    return mysqli_affected_rows($conn);
}

function addsapras($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $file = uploadallfile();
    $bulan = $post['bulan'];
    mysqli_query($conn, "INSERT INTO data_sarpras VALUES('','$bulan','$tgl','$file')");
    return mysqli_affected_rows($conn);
}

function addlab($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $file = uploadallfile();

    mysqli_query($conn, "INSERT INTO jadwal_lab VALUES('','$tgl','$file')");
    return mysqli_affected_rows($conn);
}

function addstruktural($post)
{
    global $conn;
    $nama = $post['nama'];
    $jabatan = $post['jabatan'];
    $nuptk = $post['nuptk'];

    mysqli_query($conn, "INSERT INTO struktural VALUES('','$nama','$jabatan','$nuptk')");
    return mysqli_affected_rows($conn);
}

function keaktifan_struktural($post)
{
    global $conn;
    $nama = $post['nama'];
    $jabatan = $post['jabatan'];
    $honor_pokok = $post['honor_pokok'];
    $tunjangan_hadir = $post['tunjangan_hadir'];
    $jml_jam_ngantor = $post['jml_jam_ngantor'];
    $bulan = $post['bulan'];
    $kh_minggu1 = $post['kh_minggu1'];
    $kh_minggu2 = $post['kh_minggu2'];
    $kh_minggu3 = $post['kh_minggu3'];
    $kh_minggu4 = $post['kh_minggu4'];
    $kh_minggu5 = $post['kh_minggu5'];
    $jml_ngantor_minggu = $kh_minggu1 + $kh_minggu2 + $kh_minggu3 + $kh_minggu4 + $kh_minggu5;
    $jml_ngantor = $tunjangan_hadir * $jml_ngantor_minggu;
    $jumlah_total = $honor_pokok + $jml_ngantor;

    $query = "INSERT INTO keaktifan_struktural VALUES('','$nama','$jabatan','$bulan','$honor_pokok','$tunjangan_hadir','$jml_jam_ngantor','$kh_minggu1','$kh_minggu2','$kh_minggu3','$kh_minggu4','$kh_minggu5','$jml_ngantor','$jumlah_total','$jml_ngantor_minggu')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function keaktifan_mengajar($post)
{
    global $conn;
    $nama = $post['nama'];
    $honor_pokok = $post['honor_pokok'];
    $tunjangan_mengajar = $post['tunjangan_mengajar'];
    $jml_jam_ngajar_minggu = $post['jml_ngajar_minggu'];
    $bulan = $post['bulan'];
    $kh_minggu1 = $post['kh_minggu1'];
    $kh_minggu2 = $post['kh_minggu2'];
    $kh_minggu3 = $post['kh_minggu3'];
    $kh_minggu4 = $post['kh_minggu4'];
    $kh_minggu5 = $post['kh_minggu5'];
    $jml_ngantor_minggu = $kh_minggu1 + $kh_minggu2 + $kh_minggu3 + $kh_minggu4 + $kh_minggu5;
    $jumlah_total = $honor_pokok * $jml_jam_ngajar_minggu;
    $jumlah_keaktifan = $tunjangan_mengajar * $jml_ngantor_minggu;
    $total_terima = $jumlah_total + $jumlah_keaktifan;

    $query = "INSERT INTO keaktifan_megajar VALUES('','$nama','$bulan','$honor_pokok','$tunjangan_mengajar',
   '$jml_jam_ngajar_minggu','$kh_minggu1','$kh_minggu2','$kh_minggu3','$kh_minggu4','$kh_minggu5','$jml_ngantor_minggu',
   '$jumlah_keaktifan','$jumlah_total','$total_terima')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}


function transkip($post)
{
    global $conn;
    $nama = $post['nama'];
    $kelas = $post['kelas'];
    $mapel = $post['mapel'];
    $np_kd1 = $post['np_kd1'];
    $np_kd2 = $post['np_kd2'];
    $np_kd3 = $post['np_kd3'];
    $np_kd4 = $post['np_kd4'];
    $np_kd5 = $post['np_kd5'];
    $np_kd6 = $post['np_kd6'];
    $nk_kd1 = $post['nk_kd1'];
    $nk_kd2 = $post['nk_kd2'];
    $nk_kd3 = $post['nk_kd3'];
    $nk_kd4 = $post['nk_kd4'];
    $nk_kd5 = $post['nk_kd5'];
    $nk_kd6 = $post['nk_kd6'];
    $uts    = $post['uts'];
    $uas    = $post['uas'];

    mysqli_query($conn, "INSERT INTO transkip_nilai VALUES ('','$nama','$kelas','$mapel','$np_kd1','$np_kd2','$np_kd3','$np_kd4','$np_kd5','$np_kd6','$nk_kd1','$nk_kd2','$nk_kd3','$nk_kd4','$nk_kd5','$nk_kd6','$uts','$uas') ");
    return mysqli_affected_rows($conn);
}
function pelanggaran($post)
{
    global $conn;
    $tgl = $post['tgl'];
    $kelas = $post['kelas'];
    $nama = $post['nama'];
    $file = uploadallfile();

    mysqli_query($conn, "INSERT INTO pelanggaran VALUES ('','$tgl','$kelas','$nama','$file') ");
    return mysqli_affected_rows($conn);
}

function nilaiprakerin($post)
{
    global $conn;
    $nama = $post['nama'];
    $kelas = $post['kelas'];
    $tempat = $post['tempat'];
    $lama = $post['lama'];
    $nilai = $post['nilai'];
    $guru = $post['guru'];
    $file = uploadallfile();
    mysqli_query($conn, "INSERT INTO nilai_prakerin VALUES ('','$nama','$kelas','$tempat','$nilai','$lama','$guru','$file') ");
    return mysqli_affected_rows($conn);
}

function perkembangan_siswa($post)
{
    global $conn;
    $tahun = $post['tahun'];
    $siswa = $post['siswa'];
    $lulus = $post['lulus'];
    $lanjut = $post['lanjut'];
    $bekerja = $post['bekerja'];
    $tidak_bekerja = $post['tidak_bekerja'];

    mysqli_query($conn, "INSERT INTO perkembangan_siswa VALUES('','$tahun','$siswa','$lulus','$lanjut','$bekerja','$tidak_bekerja') ");
    return mysqli_affected_rows($conn);
}

function peserta_didik($post)
{
    global $conn;
    $tahun = $post['tahun'];
    $kelas = $post['kelas'];
    $juli = $post['juli'];
    $agustus = $post['agustus'];
    $september = $post['september'];
    $oktober = $post['oktober'];
    $november = $post['november'];
    $desember = $post['desember'];
    $januari = $post['januari'];
    $februari = $post['februari'];
    $maret = $post['maret'];
    $april = $post['april'];
    $mei = $post['mei'];
    $juni = $post['juni'];
    mysqli_query($conn, "INSERT INTO peserta_didik VALUES('','$tahun','$kelas','$juli','$agustus','$september','$oktober','$november','$desember','$januari','$februari','$maret','$april','$mei','$juni') ");
    return mysqli_affected_rows($conn);
}
function edit_peserta_didik($post)
{
    global $conn;
    $id = $post['id'];
    $tahun = $post['tahun'];
    $kelas = $post['kelas'];
    $juli = $post['juli'];
    $agustus = $post['agustus'];
    $september = $post['september'];
    $oktober = $post['oktober'];
    $november = $post['november'];
    $desember = $post['desember'];
    $januari = $post['januari'];
    $februari = $post['februari'];
    $maret = $post['maret'];
    $april = $post['april'];
    $mei = $post['mei'];
    $juni = $post['juni'];

    $query = "UPDATE peserta_didik SET 
    tahun = '$tahun',
    kelas = '$kelas', 
    juli = '$juli',
    agustus = '$agustus',
    september = '$september',
    oktober = '$oktober',
    november = '$november',
    desember = '$desember',
    januari = '$januari',
    februari = '$februari',
    maret = '$maret',
    april = '$april',
    mei = '$mei',
    juni = '$juni'
   

    WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function waktu()
{
    date_default_timezone_set("Asia/Jakarta");

    $b = time();
    $hour = date("G", $b);

    if ($hour >= 0 && $hour <= 11) {
        $hour = " Pagi";
    } elseif ($hour >= 12 && $hour <= 14) {
        $hour = " Siang ";
    } elseif ($hour >= 15 && $hour <= 17) {
        $hour = " Sore ";
    } elseif ($hour >= 17 && $hour <= 18) {
        $hour = " Petang ";
    } elseif ($hour >= 19 && $hour <= 23) {
        $hour = " Malam";
    }
    return $hour;
}

function addarsip($post)
{

    global $conn;
    $no         = $post['no'];
    $keterangan = $post['keterangan'];
    $prihal     = $post['prihal'];
    $tgl        = $post['tgl'];
    $file       = uploadallfile();
    mysqli_query($conn, "INSERT INTO arsip VALUES('','$no','$keterangan','$prihal','$tgl','$file') ");
    return mysqli_affected_rows($conn);
}
