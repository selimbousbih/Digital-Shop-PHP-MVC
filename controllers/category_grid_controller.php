<?php
require_once "models/crudCategory.php";
require_once "models/crudProduct.php";
require_once "models/crudBrand.php";

  class CategoryGridController {      
    public static function show() {		
		if (isset($_GET['category'])){
			$category = $_GET['category'];
		}
		else
		{
			$category = 'guitars';
		}
		
		//categories
		$cat = crudCategory::selectCategory($category);
		$categories = crudCategory::selectSubCategories($category);
		if (crudCategory::isSub($category)){
			$main_cat = crudCategory::selectMainCategory($category);
			$categories = crudCategory::selectMainCategories();
		}
		
		//products
		$p = 0;
		$show = 24;
		if (isset($_GET['p'])){
			$p = $_GET['p'];
		}
		if (isset($_GET['show'])){
			$show = $_GET['show'];
		}
		
		$start = $p * $show;
		if (crudCategory::isSub($category)){
			$products=crudProduct::selectCategory($category, $start, $show);		
		}
		else{
			$products=crudProduct::selectCategorySub($category, $start, $show);	
		}
		
		//brands
		$brands = array();
		foreach($products as $product){
			$brand = crudBrand::selectBrand($product->getName());
			if (!in_array($brand, $brands)){
					$brands[] = $brand;
			}
			else{
				$key = array_search($brand, $brands);
				$brands[$key]->setCount($brands[$key]->getCount()+1);
			}
		}
		
		//filters
		$filter_brand = array();
		foreach($brands as $brand){
			if (isset($_GET[$brand->getName()])){ 
				$brand->setChecked(true);
				$filter_brand[] = $brand->getName();
			}			
		}
		if (!empty($filter_brand)){
			$products = product::FilterBrand($products, $filter_brand);
		}
		
		$products=product::calculateNewPrice($products);
		
      require_once('views/category_grid/category_grid.php');
    }

  }
?>