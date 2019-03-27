<?php
require_once('../../models/deliveries/classDelivery.php');
require_once('../../models/deliveries/crudDelivery.php');
		
$idOrder=$_POST['idOrder'];
$owner=$_POST['owner'];
$edate=$_POST['enddate'];
$discount=$_POST['discount'];
$prodid=$_POST['prodid'];
		
$delivery = new delivery(1, $description, $sdate, $edate, $discount, $prodid);
crudDelivery::addDelivery($delivery);
header('Location: ../../index.php?controller=deliveries&action=show');

?>