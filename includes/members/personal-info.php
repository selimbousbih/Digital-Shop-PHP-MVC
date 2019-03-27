<?php 
require_once "/../functions.php";
require_once "/../../models/members/crudMember.php";
sec_session_start();

if (isset($_SESSION['user_id'])){
	$id = $_SESSION['user_id'];
	$first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
	$last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
	$number = filter_input(INPUT_POST, 'number', FILTER_SANITIZE_STRING);

	crudMember::updatePersonalInfo($id, $first_name, $last_name, $number);
	
	header("Location: ../../index.php?controller=members&action=info");
	
	
}

?>