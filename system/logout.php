<?php 
session_start();
session_destroy();
$s = $_GET['s'];

if ($s=="user") {
header("location: ../index.php?p=login");
}
else{
header("location: ../admin/login.php");	
}
