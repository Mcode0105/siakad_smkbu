<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM tahun_akademik WHERE id = $id ");
    header("Location: akademik.php?cek");


?>