<?php
	require_once('../../models/promotions/crudPromo.php');
		if(!$_GET['pid']){
			   $msg = "Aucune publicité n'a été cochée";
			}
		else{	
			$image_name = 'default image';
			$id=$_GET['pid'];
			$description = $_POST['description'];
			$percent=$_POST['discount'];
			
			crudPromo::updatePromo($id, $image_name, $description, $percent);   
		}
		
		 header('Location: ../../?controller=promotions&action=show');
?>