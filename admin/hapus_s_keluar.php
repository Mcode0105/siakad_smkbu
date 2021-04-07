<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM surat_keluar WHERE id = $id ");
    header("Location: surat_keluar.php?cek");


?>