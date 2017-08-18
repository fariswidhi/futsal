<?php 
include('../conf/db.php');
session_start();

$id = $_GET['id'];
if ($_SESSION['type'] == 'owner') {

$select = mysqli_query($conn,"select * from jadwal where id_jadwal = '$id'") or die(mysqli_error($conn));
$numselect =  mysqli_num_rows($select);

if ($numselect > 0) {
	$exc = mysqli_query($conn,"update jadwal set status = '1' where id_jadwal ='$id'") or die(mysqli_error($conn)); 
		if ($exc>0) {
					$_SESSION['info'] = "Berhasil Dihapus";

			header("location: ../admin/index.php?p=manage-event");
		}
}
}

else{
	include('system/error.php');
}