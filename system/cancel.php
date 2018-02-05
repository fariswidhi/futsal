<?php 
include('../conf/db.php');
session_start();

$id = $_GET['id'];


$select = mysqli_query($conn,"select * from jadwal where id_jadwal = '$id'") or die(mysqli_error($conn));
$numselect =  mysqli_num_rows($select);

if ($numselect > 0) {
	$exc = mysqli_query($conn,"delete from jadwal where id_jadwal = '$id'") or die(mysqli_error($conn)); 
		if ($exc>0) {
			if ($_SESSION['type'] == 'owner') {
					$_SESSION['info'] = "Berhasil Menghapus";
			}
			else{
					$_SESSION['info'] = "Berhasil Membatalkan pesanan";
			}
			header("location: ../index.php?p=daftar-booking");
		}
}
else{
		header("location: ../index.php?p=daftar-booking");
	
}
