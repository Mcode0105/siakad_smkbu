<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM surat_masuk WHERE id = $id ");
    header("Location: surat_masuk.php?cek");


?>