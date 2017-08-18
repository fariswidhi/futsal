<?php 

$id = $_SESSION['id_user'];
if ($_SESSION['type'] == 'owner') {
	$query = mysqli_query($conn,"select * from owner_futsal where id_owner='$id'");

}
if ($_SESSION['type'] == 'member') {
	$query = mysqli_query($conn,"select * from member where id_member='$id'");
}
$obj = mysqli_fetch_object($query);

$num = mysqli_num_rows($query);
if (empty($id) || $num ==0) {
header("Location: index.php"); /* Redirect browser */

exit();
}

include('includes/profile/profil.php');
 ?>
