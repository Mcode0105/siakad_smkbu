<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_admin/header.php';
include_once '../template_admin/sidebar.php';
include_once '../config/function.php';
if (isset($_POST['simpan'])) {
    if (editprofilsekolah($_POST) > 0) {
        echo "<script>alert('data berhasil di ubah')</script>";
    } else {
        echo "<script>alert('data gagal di ubah')</script>";
    }
}


?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Profil Sekolah
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Profil sekolah</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah profil sekolah</h3>


            </div>
            <div class="box-body">
                <div class="col-md-4">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">

                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <?php $p = mysqli_query($conn,"SELECT * FROM profil_sekolah");
                                $s = mysqli_fetch_assoc($p);
                         ?>
                        <form role="form" method="post" action="" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Sekolah</label>
                                    <input type="hidden" name="fotolama" value="<?=$s['logo']; ?>">
                                    <input type="hidden" name="id" value="<?=$s['id'] ?>">
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                        placeholder="Nama Sekolah" value="<?=$s['nama']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Npsn</label>
                                    <input type="text" name="npsn" class="form-control" id="exampleInputPassword1"
                                        placeholder="npsn" value="<?=$s['npsn']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Pendidikan</label>
                                    <select name="pendidikan" class="form-control">
                                        <option value="<?=$s['status']; ?>" ><?=$s['jenis']; ?></option>
                                        <option value="SMK">SMK</option>
                                        <option value="SMA">SMA</option>
                                        <option value="MAK">MAK</option>
                                        <option value="MTS">MTS</option>
                                        <option value="MA">MA</option>
                                        <option value="SD">SD</option>
                                        <option value="MI">MI</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Sekolah</label>
                                    <select name="status" class="form-control">
                                        <option value="<?=$s['status']; ?>"><?=$s['status']; ?></option>
                                        <option value="NEGERI">NEGERI</option>
                                        <option value="SWASTA">SWASTA</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Alamat Lengkap</label>
                                    <input type="text" name="alamat" class="form-control" id="exampleInputPassword1"
                                        placeholder="npsn" value="<?=$s['alamat']; ?>">
                                </div>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">Rt</label>
                                        <input type="text" name="rt" class="form-control" placeholder="Rt" value="<?=$s['rt']; ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">Rw</label>
                                        <input type="text" name="rw" class="form-control" placeholder="Rw" value="<?=$s['rw']; ?>">
                                    </div>
                                    <div class="col-xs-4">
                                        <label for="exampleInputPassword1">Kode Pos</label>
                                        <input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" value="<?=$s['kodepos']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Kelurahan</label>
                                        <input type="text" name="kelurahan" class="form-control"
                                            placeholder="Keluarahan" value="<?=$s['kelurahan']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">Kecamatan</label>
                                        <input type="text" name="kecamatan" class="form-control"
                                            placeholder="Kecamatan" value="<?=$s['kecamatan']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">kabupaten</label>
                                        <input type="text" name="kabupaten" class="form-control"
                                            placeholder="kabupaten" value="<?=$s['kabupaten']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">provinsi</label>
                                        <input type="text" name="provinsi" class="form-control" placeholder="provinsi" value="<?=$s['provinsi']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">kepala sekolah</label>
                                        <input type="text" name="kepala_sekolah" class="form-control"
                                            placeholder="kepala sekolah" value="<?=$s['kepalasekolah']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">no</label>
                                        <input type="text" name="no" class="form-control" placeholder="no" value="<?=$s['nohp']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">email</label>
                                        <input type="email" name="email" class="form-control" placeholder="email" value="<?=$s['email']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputPassword1">website</label>
                                        <input type="text" name="website" class="form-control" placeholder="website" value="<?=$s['website']; ?>">
                                    </div>
                                    <div class="col-xs-6">
                                        <label>Akreditasi</label>
                                        <select name="akreditasi" class="form-control">
                                            <option><?=$s['akreditasi']; ?></option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-6">
                                        <label for="exampleInputFile">logo Sekolah</label>
                                        <input name="foto" type="file" id="exampleInputFile">

                                        <p style="color:red; font-style:italic;">tipe gambar harus jpg,png,jpeg</p>
                                    </div>

                                </div>
                                <div class="box-footer">
                                    <button type="submit" name="simpan" class="btn btn-primary"><i
                                            class="fa fa-check-circle">
                                            Simpan</i></button>
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