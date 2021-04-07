<?php
include_once '../config/function.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM guru WHERE id = $id ");
header("Location: guru.php?cek");
