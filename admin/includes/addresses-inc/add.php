<?php
require_once('../../models/addresses/classAddress.php');
require_once('../../models/addresses/crudAddress.php');
		
$country=$_POST['country'];
$city=$_POST['city'];
$postal=$_POST['postal'];
$address1=$_POST['address1'];
$address2=$_POST['address2'];
		
$address = new address($country, $city, $postal, $address1, $address2);

crudAddress::addAddress($address);
header('Location: ../../../index.php?controller=shopping_cart&action=deliveryForm');

?>