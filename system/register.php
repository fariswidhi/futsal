<?php 

include('../conf/error.php');

include('../conf/db.php');
session_start();

$s = $_GET['s'];

$fullname = addslashes($_POST['fullname']);
$username = addslashes($_POST['username']);
$password = addslashes($_POST['password']);
$repassword = addslashes($_POST['repassword']);
$phone = addslashes($_POST['phone']);

$address = addslashes($_POST['address']);

// $valUsername = 
if ($password != $repassword) {
	$_SESSION['info'] = "<label class='label label-danger'>Maaf, Konfirmasi Password Salah</label>";
	header("location: ../index.php?p=daftar&c=".$s);
}

else{

	if ($s == "owner") {
		$val = mysqli_query($conn,"SELECT * from owner_futsal where username_owner ='".$username."'");
		$num = mysqli_num_rows($val);
		if ($num ==0) {
			# code...

		$futsalname = addslashes($_POST['futsalname']);
$facility = addslashes($_POST['facility']);
$info =  addslashes($_POST['info']);
$foto = $_FILES['foto']['name'];
$temp = explode(".", $foto);
$newfilename = round(microtime(true)) . '.' . end($temp);

move_uploaded_file($_FILES['foto']['tmp_name'], "../uploads/".$newfilename);
	$exc=	mysqli_query($conn,"INSERT INTO owner_futsal set 
			username_owner='$username',
			password_owner=md5('$password'),
			nama_owner='$fullname',
			telp='$phone',
			alamat_futsal='$address',
			fasilitas='$facility',
			info_futsal='$info',
			foto_futsal ='$newfilename',
			status_aktif = '0'
			
			") or die(mysqli_error($conn));
	if ($exc >0) {
	$_SESSION['info'] = "<label class='label label-success'>Berhasil Mendaftar, Silahkan Menunggu Konfirmasi Admin</label>";
	}
			}
			else{
					$_SESSION['info'] = "<label class='label label-danger'>Sialahkan Memakai Username Lain</label>";
			}
				header("location: ../index.php?p=daftar&c=".$s);


}
	elseif ($s == "member") {
				$val = mysqli_query($conn,"SELECT * from member where username_member ='".$username."'");
		$num = mysqli_num_rows($val);
		if ($num ==0) {
			# code...

		$email = addslashes($_POST['email']);
		$exc=	mysqli_query($conn,"INSERT INTO member set 
			username_member='$username',
			password_member=md5('$password'),
			nama_member='$fullname',
			telephone_member='$phone',
			alamat_member='$address',
			email_member='$email',
			status = '0'
			
			") or die(mysqli_error($conn));
	if ($exc >0) {
	$_SESSION['info'] = "<label class='label label-success'>Berhasil Mendaftar, Silahkan Login</label>";
	header("location: ../index.php?p=login");
	}
			}
			else{
		$_SESSION['info'] = "<label class='label label-danger'>Maaf, Silahkan Menggunakan Usename Lain</label>";
	header("location: ../index.php?p=daftar&c=".$s);			
			}
	}
}
