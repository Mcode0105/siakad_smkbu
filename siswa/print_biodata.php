<?php
session_start();
if (!isset($_SESSION['siswa'])) {
    header("Location: ../login.php?ceklogin");
}
include_once '../template_siswa/header.php';
include_once '../template_siswa/sidebar.php';
include_once '../config/function.php';
?>


<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Biodata Siswa

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">data siswa</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="row center">
            <div class="col-md-7">

                <!-- Profile Image -->
                <?php
                $nama = $_SESSION['siswa'];
                $query = mysqli_query($conn, "SELECT * FROM siswa WHERE nisn = '$nama' ");
                $as = mysqli_fetch_assoc($query);
                ?>
                <div class="box box-primary center">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="../admin/img/<?= $as['foto']; ?>"
                            alt="User profile picture">

                        <h3 class="profile-username text-center"><?= $as['nama']; ?></h3>

                        <p class="text-muted text-center"><?= $as['nisn']; ?></p>
                        <p class="text-muted text-center"><?= $as['jurusan']; ?></p>
                        <p class="text-muted text-center"><?= $as['kelas'] . " " . $as['thn_akademik']; ?></p>


                        <ul style="padding: 60px;" class="nav nav-stacked">
                            <li class="list-group-item">
                            <b>Jenis Kelamin <span class="pull-right"><?= $as['jk']; ?></span></b></li>
                            <li class="list-group-item">
                            <b>Tempat Lahir<span class="pull-right"><?= $as['tmpt_lahir']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >NIK<span class="pull-right"><?= $as['nik']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b>Alamat 
                                <span class="pull-right"><?= $as['alamat']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b>Nipd <span class="pull-right "><?= $as['nipd']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Tanggal Lahir
                                <span class="pull-right "><?= $as['tgl_lahir']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Agama<span class="pull-right "><?= $as['agama']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b>Rt<span class="pull-right "><?= $as['rt']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Rw<span class="pull-right "><?= $as['rw']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Dusun<span class="pull-right "><?= $as['dusun']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Kelurahan<span class="pull-right "><?= $as['kelurahan']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Kecamatan<span class="pull-right "><?= $as['kecamatan']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Kode pos<span class="pull-right "><?= $as['kode_pos']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Transportasi<span class="pull-right "><?= $as['alat_transport']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >telepon<span class="pull-right "><?= $as['telpon']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Hp<span class="pull-right "><?= $as['hp']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Email<span class="pull-right "><?= $as['email']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >skhun<span class="pull-right "><?= $as['skhun']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Menerims Kps<span class="pull-right "><?= $as['penerima_kps']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Nomer Kps<span class="pull-right "><?= $as['nokps']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >No UN<span class="pull-right "><?= $as['noun']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >No Ijazah<span class="pull-right "><?= $as['noijazah']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Menerima Kip<span class="pull-right "><?= $as['pnrma_kip']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >NO Kip<span class="pull-right "><?= $as['nomorkip']; ?></span></b>

                            </li>                        
                               <li class="list-group-item">
                                <b >Nama Kip<span class="pull-right "><?= $as['namakip']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Nomor KKS<span class="pull-right "><?= $as['nokks']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >No registrasi Akta<span class="pull-right "><?= $as['noreg_akta']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Bank<span class="pull-right "><?= $as['bank']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >NO rekening<span class="pull-right "><?= $as['norek_bank']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b> foto berkas
                                <span class="pull-right ">
                                <img height="90px" width="80px" src="img_ijazah/<?= $as['fotoijazah']; ?>" alt="">
                                <img height="90px" width="80px" src="img_skhun/<?= $as['fotoskhu']; ?>" alt="">
                                <img height="90px" width="80px" src="img_kk/<?= $as['fotokk']; ?>" alt=""></span></b>

                            </li>
                            <li class="list-group-item">
                                <b
                                    style=" font-size: 20px; color: green;font-family: sans-serif; margin-right: 100px; margin-left: 100px;">BIODATA
                                    AYAH
                                </b>

                            </li>
                             <li class="list-group-item">
                                <b >Nama Ayah<span class="pull-right "><?= $as['namayah']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Tahun Lahir Ayah<span class="pull-right "><?= $as['thnlahirayah']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Pendidikan Ayah<span class="pull-right "><?= $as['pendidikanayah']; ?></span></b>

                            </li>
                           <li class="list-group-item">
                                <b >Pekerjaan Ayah<span class="pull-right "><?= $as['pekerjaanayah']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Penghasolan Ayah<span class="pull-right "><?= $as['penghasilanayah']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >NIK<span class="pull-right "><?= $as['nikayah']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b
                                    style=" font-size: 20px; color: orange;font-family: sans-serif; margin-right: 100px; margin-left: 100px;">BIODATA
                                    IBU
                                </b>

                            </li>
                             <li class="list-group-item">
                                <b >Nama Ibu<span class="pull-right "><?= $as['namaibu']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >Tahun Lahir ibu<span class="pull-right "><?= $as['thnlahiribu']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Pendidika ibu<span class="pull-right "><?= $as['pendidikanibu']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >Pekerjaan Ibu<span class="pull-right "><?= $as['pekerjaanibu']; ?></span></b>

                            </li>
                             <li class="list-group-item">
                                <b >Pwnghasilan ibu<span class="pull-right "><?= $as['penghasilanibu']; ?></span></b>

                            </li>
                            <li class="list-group-item">
                                <b >Nik Ibu<span class="pull-right "><?= $as['nikibu']; ?></span></b>
                            </li>
                        </ul>
                    </div>


                    <!-- /.box-body -->
                </div>
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script type="text/javascript">
	window.print();
</script>

<?php
include_once '../template_siswa/footer.php';
?>