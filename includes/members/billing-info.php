<?php 
require_once "/../functions.php";
require_once "/../../models/members/crudInfo.php";
sec_session_start();

if (isset($_SESSION['user_id'])){
	$username = $_SESSION['user_id'];
	$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
	$city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
	$address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
	$postal = filter_input(INPUT_POST, 'postal', FILTER_SANITIZE_NUMBER_INT);
	$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
	
	$info = new clientInfo($first_name, $last_name, $address, $city, $postal, $phone);
	crudClientInfo::insertInfo($username, $info);
	
	header("Location: ../../index.php?controller=members&action=info");
	
	
}

?>