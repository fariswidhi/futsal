<?php 

switch (@$_GET['act']) {
	case 'detail':
		include('manage-member/info.php');
		break;
	case 'edit':
		include('manage-member/edit.php');
		break;
	default:
		include('manage-member/index.php');
		break;
}