<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM jadwal WHERE id = $id ");
    header("Location: jadwal.php?cek");


?>