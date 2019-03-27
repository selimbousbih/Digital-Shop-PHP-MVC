<?php
require_once "../models/crudReview.php";
if (isset($_POST['name'], $_POST['pid'], $_POST['text'], $_POST['rating'])){
	$name = $_POST['name'];
	$id = $_POST['pid'];
	$review = $_POST['text'];
	$rating = $_POST['rating'];

	$productReview = new review($id, $review, $rating);
	crudReview::addReview($productReview);
}
$id = $_POST['pid'];
header('location: ../index.php?controller=product&action=show&pid='.$id);
?>