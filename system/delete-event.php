<?php 
include('../conf/db.php');
session_start();

$id = $_GET['id'];


$select = mysqli_query($conn,"select * from agenda where id = '$id'") or die(mysqli_error($conn));
$numselect =  mysqli_num_rows($select);

if ($numselect > 0) {
	$exc = mysqli_query($conn,"delete from agenda where id = '$id'") or die(mysqli_error($conn)); 
		if ($exc>0) {
		
			$_SESSION['info'] = "Berhasil Menghapus";
			header("location: ../index.php?p=manage-event");
		}
}
else{
			header("location: ../index.php?p=manage-event");

	
}
