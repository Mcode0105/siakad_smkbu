<?php
include_once '../config/function.php';
$id = $_GET['id'];

    $query = mysqli_query($conn,"DELETE FROM nilai_prakerin WHERE id = $id ");
    if ($query == true ) {
    	echo "<script>
    	alert('data berhasil dihapus');
    	document.location.href='nilai_prakerin.php';
    		</script>
    	";
    }else{
    	echo "<script>
    	alert('data gagal dihapus');
    	
    		</script>
    	";
    }
   


?>