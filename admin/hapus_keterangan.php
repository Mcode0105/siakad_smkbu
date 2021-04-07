<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM keterangan WHERE id = $id ");
    header("Location: surat_keterangan.php?cek");


?>