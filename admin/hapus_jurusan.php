<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM jurusan WHERE id = $id ");
    header("Location: jurusan.php?cek");


?>