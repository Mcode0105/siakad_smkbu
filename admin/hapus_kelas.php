<?php
include_once '../config/function.php';
$id = $_GET['id'];
if (hapus_kelas($id) > 0 ) {
  echo "<script>
				alert('data berhasil dihapus');
					document.location.href='kelas.php';
				</script>
			";
}else{
   echo "<script>
					alert('data gagal dihapus');
				
				</script>
			";
}




?>