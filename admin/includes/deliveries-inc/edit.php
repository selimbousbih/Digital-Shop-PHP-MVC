<?php
	require_once('../../models/deliveries/crudDelivery.php');
	require_once('../../models/addresses/crudAddress.php');

			$id=$_GET['id'];
			$status = $_POST['status'];
		
			$aid=$_POST['idAddress'];
			$country = $_POST['country'];
			$city = $_POST['city'];
			$postal = $_POST['postal'];
			$address1 = $_POST['address1'];
			$address2 = $_POST['address2'];
			
			crudAddress::updateAddress($aid, $country, $city, $postal, $address1, $address2);   
			crudDelivery::updateDelivery($id, $status);   
			
		 header('Location: ../../?controller=deliveries&action=show');
?>