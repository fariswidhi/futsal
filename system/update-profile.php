<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);


include('../conf/db.php');


if ($_SESSION['type']!= 'admin') {
	$id = $_SESSION['id_user'];
}
else{
		$id = $_GET['id'];

}
$fullname = addslashes(@$_POST['fullname']);
// $username = addslashes(@$_POST['username']);
$password = addslashes(@$_POST['password']);
$s = $_GET['s'];
$phone = addslashes(@$_POST['phone']);

$email = addslashes(@$_POST['email']);
$address = addslashes(@$_POST['address']);
$futsalname = addslashes(@$_POST['futsalname']);
$facility = addslashes(@$_POST['facility']);
$info =  addslashes(@$_POST['info']);
$foto = $_FILES['foto']['name'];
$temp = explode(".", $foto);
$newfilename = round(microtime(true)) . '.' . end($temp);

if (!empty($password)) {
	if ($_SESSION['type']=='owner') {
	$pass = "password_owner = md5('".$password."'),";
	}
	else{
			$pass = "password_member = md5('".$password."'),";
	}

}
else{
	$pass = "";
}
if (!empty($foto)) {

	move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/".$newfilename);
	$p = ", foto_futsal='".$newfilename."', ";
}
else{
	$p = "";
}


if ($_SESSION['type'] ==  'owner' || $s=='owner') {
$exc=	mysqli_query($conn,"UPDATE  owner_futsal set 
			".$pass."
			nama_owner='$fullname',
			telp='$phone',
			alamat_futsal='$address',
			nama_futsal='$futsalname',
			fasilitas='$facility',
			info_futsal='$info'
			".$p."
			WHERE id_owner = '$id'
			") or die(mysqli_error($conn));

}
elseif($_SESSION['type']=='member' || $s=='member'){
$exc=	mysqli_query($conn,"UPDATE  member set 
			".$pass."
			nama_member='$fullname',
			telephone_member='$phone',
			alamat_member='$address',
			email_member='$email' 
			WHERE id_member = '$id'
			") or die(mysqli_error($conn));

}

	if ($exc >0) {
	$_SESSION['info'] = "<label class='label label-success'>Berhasil Mengubah Data</label>";
	}

	else{
	$_SESSION['info'] = "<label class='label label-danger'>Tidak Dapat Mengubah Profil</label>";
	}
	
	if ($_SESSION['type']=='admin') {
		
		if ($s == 'owner') {
		header("location: ../admin/index.php?p=manage-owner");
		}
		else{
					header("location: ../admin/index.php?p=manage-member");
		}


	}
	else{
			header("location: ../index.php?p=profil");

	}
