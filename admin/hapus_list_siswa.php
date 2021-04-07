<?php
include_once '../config/function.php';

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM grup_siswa WHERE id = $id ");
if ($hapus) {
    header("Location: siswa.php?hapus");
} else {
    header("Location: siswa.php?gagal_hapus");
}
