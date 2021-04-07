<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM kalender_pendidikan WHERE id = $id ");
    header("Location: kalender.php?cek");


?>