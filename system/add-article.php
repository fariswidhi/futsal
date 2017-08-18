<?php 
session_start();
include('../conf/db.php');

$id = $_SESSION['id_user'];
$title = addslashes($_POST['title']);
$date = addslashes($_POST['date']);
$photo = addslashes($_POST['photo']);
$desc = addslashes($_POST['desc']);

$foto = $_FILES['photo']['name'];
$temp = explode(".", $foto);
$newfilename = round(microtime(true)) . '.' . end($temp);
$now = date('Y-m-d');
move_uploaded_file($_FILES['photo']['tmp_name'], "../uploads/".$newfilename);

mysqli_query($conn,"INSERT into agenda
					set 
					id_owner = '$id',
					judul = '$title',
					isiagenda='$desc',
					tanggal_posting='$now',
					tanggal_kegiatan='$date',
					foto_agenda='$newfilename'
	") or die(mysqli_error($conn));



	$_SESSION['info'] = "<label class='label label-success'>Berhasil Menambah Event</label>";

header("location: ../index.php?p=event");

