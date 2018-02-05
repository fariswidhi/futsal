<?php 

$p = @$_GET['p'];

switch ($p) {
	case 'daftar':
	include('daftar.php');
		break;
	case 'tempat-futsal':
	include('tempat-futsal.php');
		break;

			case 'login':
	include('login.php');
		break;
		case 'profil':
	include('profile.php');
		break;
	case 'lapangan':
	include('lapangan.php');
	break;
		case 'event':
	include('event.php');
	break;
	case 'booking':
	include('booking.php');
	break;

	case 'book':
	include('booking/read.php');
	break;

	default:
	include('main.php');

		break;
}