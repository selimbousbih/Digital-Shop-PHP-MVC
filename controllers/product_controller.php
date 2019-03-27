<?php
require_once "models/crudCategory.php";
require_once('models/crudProduct.php'); 
  
class ProductController {   
	public function show(){	
		$img_dir = "images/product-images/";
		if (isset($_GET['pid'])){
			$pid = $_GET['pid'];
			$product = crudProduct::selectProduct($pid);
			$A = array($product);
			
			$A=product::calculateNewPrice($A);
			$product = $A[0];
			$terms = $product->getName();
			
			$related = crudProduct::searchByKeywords($terms);
		}
		else{
			die("Aucun produit n'est séléctionné");
		}
		$categories = crudCategory::selectMainCategories();
		require_once('views/product/product.php');
	}
   

}
?>