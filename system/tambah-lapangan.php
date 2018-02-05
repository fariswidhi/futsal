<?php 
include('../conf/error.php');
include('../conf/db.php');
session_start();
$id = @$_SESSION['id_user'];

$name = addslashes($_POST['name']);
$photo = addslashes($_POST['foto']);
$info = addslashes($_POST['info']);
$harga = addslashes($_POST['harga']);

$foto = $_FILES['foto']['name'];
$temp = explode(".", $foto);
$newfilename = round(microtime(true)) . '.' . end($temp);

move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/".$newfilename);

$ex = mysqli_query($conn,"INSERT into data_lapangan set 
	id_owner = '$id',
	nama_lapangan='$name',
	foto_lapangan='$newfilename',
	ket_lapangan='$info',
	info_harga='$harga'
	");


	$_SESSION['info'] = "<label class='label label-success'>Berhasil Menambah Lapangan</label>";

header("location: ../index.php?p=lapangan");

