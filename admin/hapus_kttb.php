<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM kriteria_ketutasan_belajar WHERE id = $id ");
    header("Location: kriteria_ketuntasan.php?cek");


?>