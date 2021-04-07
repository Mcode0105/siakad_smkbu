<?php
include_once '../config/function.php';
include_once '../template_admin/header.php';
$id = $_GET['id'];

$del =  mysqli_query($conn, "DELETE FROM struktural WHERE id = $id ");

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
    window.location.replace('struktural');
} ,1000);   
 </script>";
} else {
    false;
}
