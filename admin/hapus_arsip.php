<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM arsip WHERE id = $id ");
    header("Location: arsip?cek");
