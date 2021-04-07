<?php
include_once '../config/function.php';
$id = $_GET['id'];

   $query =  mysqli_query($conn,"DELETE FROM kepala_sekolah WHERE id = $id ");
    
    if ($query == true) {
    	echo "<script>
    	alert('data berhasil dihapus');
    	document.location.href='kepala_sekolah.php';
    	</script>";
    }else{
    	echo "<script>
    	alert('data gagal dihapus');
    	document.location.href='kepala_sekolah.php';
    	</script>";
    }


?>