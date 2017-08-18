<?php 

switch (@$_GET['act']) {
	case 'detail':
		include('manage-event/info.php');
		break;
	case 'edit':
		include('manage-event/edit.php');
		break;
	case 'delete':	
		header("location: a");
			break;
	default:
		include('manage-event/index.php');
		break;
}