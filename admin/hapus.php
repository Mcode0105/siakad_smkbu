<?php
include_once '../config/function.php';
$id = $_GET['id'];
$hapus = mysqli_query($conn, "DELETE FROM admin WHERE id = $id ");
if ($hapus) {
	header("Location: administrator.php?cek");
} else {
	header("Location: administrator.php?gagal");
}
