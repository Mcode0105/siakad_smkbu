<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM jadwal_lab WHERE id = $id ");
    header("Location: jadwal_lab.php?cek");


?>