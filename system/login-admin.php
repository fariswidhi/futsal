<?php 
session_start();
include('../conf/db.php');

$username = addslashes($_POST['username']) ;
$password = addslashes($_POST['password']);

$q = mysqli_query($conn,"select * from akses_admin where username_admin='$username' AND password_admin=md5('$password')");

$num = mysqli_num_rows($q);

if ($num == 1) {
	$d = mysqli_fetch_object($q);
	$_SESSION['type'] = "admin";
		$_SESSION['username']=$d->username_admin;
		$_SESSION['password']=$d->password_admin;
		header("location: ../admin");
}
else{
	$_SESSION['info'] = "Maaf Akun Tidak Tersedia";
	header("location: ../admin/login.php");
}