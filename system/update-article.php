<?php 
session_start();
include('../conf/db.php');

$id = addslashes($_GET['id']);
$title = addslashes($_POST['title']);
$date = addslashes($_POST['date']);
$photo = addslashes($_POST['photo']);
$desc = addslashes($_POST['desc']);
$now = date('Y-m-d');
$foto = $_FILES['photo']['name'];

if (!empty($foto)) {
	$temp = explode(".", $foto);
	$newfilename = round(microtime(true)) . '.' . end($temp);
	$now = date('Y-m-d');
	move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/".$newfilename);
	mysqli_query($conn,"UPDATE agenda
					set 
					judul = '$title',
					isiagenda='$desc',
					tanggal_posting='$now',
					tanggal_kegiatan='$date',
					foto_agenda='$newfilename'
					where id = '$id';
	") or die(mysqli_error($conn));

}
else{
		mysqli_query($conn,"UPDATE agenda
					set 
					judul = '$title',
					isiagenda='$desc',
					tanggal_posting='$now',
					tanggal_kegiatan='$date'
					where id = '$id';
	") or die(mysqli_error($conn));
}



	$_SESSION['info'] = "<label class='label label-success'>Berhasil Mengubah Event</label>";

header("location: ../index.php?p=event");

