<?php 
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
include('../conf/db.php');



session_start();


$id_user = @$_SESSION['id_user'];
$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM data_lapangan LEFT JOIN owner_futsal ON data_lapangan.id_owner = owner_futsal.id_owner WHERE id_lapangan='$id'") or die(mysqli_error($conn));
$fetch = mysqli_fetch_object($query);

$idOwner = $fetch->id_owner;
$tgl = $_POST['date'];
$awal = $_POST['awal'];

$day=date('Y-m-d');
// echo $tgl;
$exp = date('Y-m-d', strtotime($day . " +2 days"));
$time = date('H:i:s');

$end = strtotime("+60 minutes",strtotime($awal));

$endGame= date("H:i:s",$end);
$valQ = mysqli_query($conn,"select * from jadwal where tgl_main = '$tgl'  and (jam_awal >= '$awal' and jam_akhir <= '$end') ") or die(mysqli_error($conn));

$numVal = mysqli_num_rows($valQ);


if ($numVal == 0) {


$exc = mysqli_query($conn,"insert into jadwal set
	id_member ='$id_user',
	id_owner = '$idOwner',
	id_lapangan = '$id',
	tgl_pesan = '$day',
	tgl_main='$tgl',
	jam_pesan = '$time',
	exp_hour = '$exp',
	jam_awal = '$awal',
	jam_akhir = '$endGame',
	status = '0'
	") or die(mysqli_error($conn));


if ($exc >0) {
	$_SESSION['info'] = "<label class='label label-success'>Berhasil Memesan, Silahkan Lakukan Pembayaran ke Tempat Futsal dalam 2x24 Jam</label>";
}

	else{
	$_SESSION['info'] = "<label class='label label-danger'>Gagal Memesan</label>";
	}

}
else{
	$_SESSION['info'] = "<label class='label label-danger'>Gagal Memesan,Lapangan sudah dipakai orang lain</label>";
}



header("location: ../index.php?p=booking&id=".$id);
