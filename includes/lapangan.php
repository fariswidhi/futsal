<?php 
switch (@$_GET['act']) {
	case 'tambah':
	include('lapangan/add.php');
		break;
	case 'edit':
	include('lapangan/edit.php');
		break;
	default:
	include('lapangan/read.php');
		break;
}
 ?>