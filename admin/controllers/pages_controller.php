<?php
  class PagesController {
    public function home() {
		require_once('includes/functions.php');
		require_once('models/products/crudProduct.php');
		require_once('models/products/crudCategory.php');
		$img_dir = 'images/product-images/';
		$categories = crudCategory::selectMainCategories();
		$latest = crudProduct::selectLatest(10);
		$featured = crudProduct::selectFeatured();
		sec_session_start();
		$login_check = login_check(Db::getInstance());
		require_once('views/pages/home/home.php');
    }
	
	public function error() {
		require_once('views/error.php');
    }
	
  }
?>