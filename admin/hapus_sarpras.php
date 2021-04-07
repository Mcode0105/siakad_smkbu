<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM data_sarpras WHERE id = $id ");
    header("Location: data_sarpas.php?cek");


?>