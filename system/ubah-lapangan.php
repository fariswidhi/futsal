<?php 

include('../conf/error.php');

include('../conf/db.php');
session_start();
$id = @$_GET['id'];

$name = addslashes($_POST['name']);
$photo = addslashes($_POST['foto']);
$info = addslashes($_POST['info']);
$harga = addslashes($_POST['harga']);
$foto = $_FILES['foto']['name'];
if (!empty($foto)) {
$temp = explode(".", $foto);
$newfilename = round(microtime(true)) . '.' . end($temp);

move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/".$newfilename);

$ex = mysqli_query($conn,"update data_lapangan set 
	nama_lapangan='$name',
	foto_lapangan='$newfilename',
	ket_lapangan='$info',
	info_harga='$harga'
		where id_lapangan='$id'
	");


}
else{

$ex = mysqli_query($conn,"UPDATE data_lapangan set 
	nama_lapangan='$name',
	ket_lapangan='$info',
	info_harga='$harga'
	where id_lapangan='$id';
	");


}



	$_SESSION['info'] = "<label class='label label-success'>Berhasil Ubah Lapangan</label>";

header("location: ../index.php?p=lapangan");

