<?php
include_once '../config/function.php';
include_once '../template_admin/header.php';
$id = $_GET['id'];
if (hapus_walikelas($id) > 0) {
	echo "<script type='text/javascript'>
 setTimeout(function () { 
     swal({
             icon: 'error',
             title: 'Data berhasil di hapus',
             type: 'error',
             showConfirmButton: true
         });   
 },10); 
 window.setTimeout(function(){ 
    window.location.replace('walikelas');
} ,1000);   
 </script>";
} else {
	echo "<script type='text/javascript'>
	setTimeout(function () { 
		swal({
				icon: 'error',
				title: 'Data gagal di hapus',
				type: 'error',
				showConfirmButton: true
			});   
	},10); 
	window.setTimeout(function(){ 
	   window.location.replace('walikelas');
   } ,1000);   
	</script>";
}
