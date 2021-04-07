<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM siswa WHERE id = $id ");
    header("Location: siswabaru.php?cek");


?>