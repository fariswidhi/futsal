<?php 

switch (@$_GET['p']) {
	case 'manage-owner':
	include('manage-owner.php');

		break;
			case 'manage-member':
	include('manage-member.php');

		break;
			case 'manage-event':
	include('manage-event.php');

		break;
	default:
	include('main.php');
		break;
}

 ?>