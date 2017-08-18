<?php 

switch (@$_GET['act']) {
	case 'detail':
		include('manage-owner/info.php');
		break;
	case 'edit':
		include('manage-owner/edit.php');
		break;
	default:
		include('manage-owner/index.php');
		break;
}