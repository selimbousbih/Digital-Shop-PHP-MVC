<?php
require_once('models/promotions/crudPromo.php'); 
require_once('models/products/crudProduct.php');
 
class PromotionsController {
	public function show(){			
		$products=crudProduct::All();
		$promotions=crudPromo::All();
		$img_dir = '../../images/';
		require_once('views/promotions/table.php');
	}

}
?>