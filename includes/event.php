<?php 
switch (@$_GET['act']) {
	case 'add':
	include('event/add.php');
		break;
		case 'detail':
	include('event/detail.php');
			break;
					case 'edit':
	include('event/edit.php');
			break;
	
	default:
	include('event/read.php');
		break;
}
 ?>