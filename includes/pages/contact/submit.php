<?php
	require_once("/../../../models/pages/contact/contactCrud.php");
	if (isset($_POST['name'], $_POST['email'], $_POST['message'])){			
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
		$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);
	
	$contact = new contact($name, $email, $subject, $message);
	if (crudContact::Add($contact)){
		header("Location: ../../../index.php?controller=pages&action=contact&done=success");
	}
	else{
		header("Location: ../../../index.php?controller=pages&action=contact&done=error");
	}
	
	}
		
	
?>