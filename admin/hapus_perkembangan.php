<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM perkembangan_siswa WHERE id = $id ");
    header("Location: perkembangan_siswa.php?cek");


?>