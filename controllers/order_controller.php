<?php
require_once('/../models/members/crudMember.php');

  class OrderController {
    public function cart() {
		require_once('views/order/cart.php');
	}
	public function purshase() {
		if (isset($_SESSION['user_id'])){
			$id = $_SESSION['user_id'];
			$member = crudMember::selectMember($id);
		}
		require_once('views/order/purshase.php');
	}
  }
?>
