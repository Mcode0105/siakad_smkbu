<?php
include_once '../config/function.php';
$id = $_GET['id'];

    mysqli_query($conn,"DELETE FROM peserta_didik WHERE id = $id ");
    header("Location: peserta_didik.php?cek");


?>