<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM mapel WHERE id = $id ");
    header("Location: mapel.php?cek");


?>