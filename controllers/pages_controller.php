<?php
  class PagesController {
    public function home() {
		require_once('includes/functions.php');
		require_once('models/crudProduct.php');
		require_once('models/crudCategory.php');
		$img_dir = 'images/product-images/';
		$categories = crudCategory::selectMainCategories();
		$latest = crudProduct::selectLatest(9);
		$featured = crudProduct::selectFeatured();
		$promoted = crudProduct::selectPromoted();
		
		$latest=product::calculateNewPrice($latest);
		$featured=product::calculateNewPrice($featured);
		$promoted=product::calculateNewPrice($promoted);
		require_once('views/pages/home/home.php');
    }
	
	public function gallery() {
      require_once('views/pages/gallery/gallery.php');
    }

	public function contact() {
      require_once('views/pages/contact/contact.php');
    }
	
	public function promotions() {
		require_once('models/crudProduct.php');
		require_once('models/crudCategory.php');
		$categories = crudCategory::selectMainCategories();
		$promoted = crudProduct::selectPromoted();
		$promoted=product::calculateNewPrice($promoted);
		require_once('views/pages/promotions/promotions.php');
    }
	public function accessories() {
		require_once('models/crudProduct.php');
		require_once('models/crudCategory.php');
		$categories = crudCategory::selectMainCategories();
		$accessories = crudProduct::selectCategory("accessories");
		$accessories=product::calculateNewPrice($accessories);
		require_once('views/pages/accessories/accessories.php');
    }
	
	public function events() {
		require_once('models/crudCategory.php');
		$categories = crudCategory::selectMainCategories();
		require_once('views/pages/events/events.php');
    }
	
	public function error() {
      require_once('views/pages/404.php');
    }
	
  }
?>