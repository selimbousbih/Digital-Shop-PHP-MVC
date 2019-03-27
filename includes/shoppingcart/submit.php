<?php
	require_once "/../../models/members/crudMember.php";
	require_once "/../../models/crudShoppingCart.php";
	require_once("/../functions.php");
	
	sec_session_start();

	if (isset($_SESSION['user_id'], $_GET['pid'], $_GET['quantity'])){
		$uid = $_SESSION['user_id'];
		$pid = filter_input(INPUT_GET, 'pid', FILTER_SANITIZE_STRING);
		$quantity = filter_input(INPUT_GET, 'quantity', FILTER_SANITIZE_STRING);
		$do = filter_input(INPUT_GET, 'do', FILTER_SANITIZE_STRING);
				
		if($do=='update')
			crudShoppingCart::updateQt($uid, $pid, $quantity);
		else
			crudShoppingCart::removeItem($uid, $pid);
		header("Location: ../../index.php?controller=order&action=cart");	
		
	}


?>