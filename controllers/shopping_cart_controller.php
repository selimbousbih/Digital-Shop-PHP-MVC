<?php
require_once('/../models/crudProduct.php');
require_once('/../models/crudShoppingCart.php');
		$items = array();
		$itemsCount = 0;
		
	if(isset($_SESSION['user_id'])){
		$uid = $_SESSION['user_id'];
		$items = crudShoppingCart::getMemberItems($uid);
		$itemsCount = crudShoppingCart::getItemsCount($uid);
		$total = 0;
		product::calculateNewPrice($items);
		foreach($items as $item)
			$total += $item->getNewPrice()*$item->getCartQt();
	}
	
  class ShoppingCartController {
    public function deliveryForm() {
		require_once('views/shopping_cart/deliveryForm.php');
	}
  }
?>
