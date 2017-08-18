<?php 
session_start();
include('../conf/db.php');
$id = $_GET['id'];

mysqli_query($conn,"UPDATE owner_futsal set status_aktif = '1' where id_owner='$id'");

$_SESSION['info'] = "<label class='label label-success'>Berhasil Mensetujui</label>";
header("location: ../admin/");



 ?>