<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM keuangan WHERE id = $id ");
    header("Location: keuangan.php?cek");


?>