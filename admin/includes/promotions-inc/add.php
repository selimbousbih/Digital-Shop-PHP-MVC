<?php
require_once('../../models/promotions/classPromo.php');
require_once('../../models/promotions/crudPromo.php');
		
$description=$_POST['description'];
$sdate=$_POST['startdate'];
$edate=$_POST['enddate'];
$discount=$_POST['discount'];
		
$promo = new Promotion(1, $description, $discount);
crudPromo::addPromo($promo);
header('Location: ../../index.php?controller=promotions&action=show');

?>