<?php 
session_start();
include('../conf/db.php');

$type = addslashes($_POST['type']) ;
$username = addslashes($_POST['username']) ;
$password = addslashes($_POST['password']);



if ($type=="Member") {
$q = mysqli_query($conn,"select * from member where username_member='$username' AND password_member=md5('$password')");
$d = mysqli_fetch_object($q);
$id = $d->id_member;
$username = $d->username_member;
$password = md5($d->password_member);
$type = "member";

}
else{
$q = mysqli_query($conn,"select * from owner_futsal where username_owner='$username' AND password_owner=md5('$password')") or die(mysqli_error($conn));
$d = mysqli_fetch_object($q);
$id = $d->id_owner;
$username = $d->username_owner;
$password = md5($d->password_owner);
$type = "owner";
}
;
$num = mysqli_num_rows($q);
echo $username;

if ($num == 1) {
		$d = mysqli_fetch_object($q);
		$_SESSION['id_user']=$id;
		$_SESSION['username']=$username;
		$_SESSION['password']=$password;
		$_SESSION['type'] = $type;
		header("location: ../index.php");
}
else{
	$_SESSION['info'] = "Maaf Akun Tidak Tersedia";
	header("location: ../index.php?p=login");
}