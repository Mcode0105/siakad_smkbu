<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM list_absen_ganjil WHERE id = $id ");
    header("Location: absen_ganjil.php?hapus");


?>