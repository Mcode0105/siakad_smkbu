<?php
include_once '../config/function.php';
$id = $_GET['id'];

$hp = mysqli_query($conn, "DELETE FROM transkip_nilai WHERE id = $id ");
if ($del == true) {
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
    window.location.replace('data_input_transkip');
} ,1000);   
 </script>";
} else {
	false;
}
