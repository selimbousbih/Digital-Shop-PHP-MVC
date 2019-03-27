<?php   
	require_once "models/crudCategory.php";
	require_once "models/crudProduct.php";
	
	class SearchController {      
		public static function show() {		
			$categories = crudCategory::selectMainCategories();
				
			$p = 0;
			$show = 24;
			if (isset($_GET['p'])){
				$p = $_GET['p'];
			}
			if (isset($_GET['show'])){
				$show = $_GET['show'];
			}
				
			if (isset($_GET['keywords'])){
				$keywords = $_GET['keywords'];
			}
				
			$products=crudProduct::searchByKeywords($keywords);	
			
			require_once('views/search/search.php');
	  
		}
	}
		
?>