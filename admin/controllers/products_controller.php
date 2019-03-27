<?php
require_once "models/products/crudCategory.php";
require_once "models/products/crudProduct.php"; 
require_once "models/promotions/crudPromo.php"; 
require_once "includes/img_resize.php";

class ProductsController {
	public function show(){
		$img_dir = '../images/';
		
		$category = "electric-guitars";
		$crud = new crudCategory();
		$allowed = array('all');
		$allowed_categories = $crud->selectCategoryArray();
        foreach($allowed_categories as $cat){
			$allowed[] = $cat->getName();
		}
	
		$main_categories = crudCategory::selectMainCategories();
		
		if (isset($_POST['category'])){
			if (in_array($_POST['category'], $allowed)){
                $category = $_POST['category'];
				if ($category == 'all')
					$products = crudProduct::All();
				else
					$products = crudProduct::selectCategory($category);
				
            }
            else{
                die('Error processing your choice');
            }
		}
		else{
			$products = crudProduct::All();
		}
		$promotions = crudPromo::All();
		require_once('views/products/products.php');
	}
	
	public function add(){
		if($_FILES['filename']['error'] == 4){
			echo 'no image file was selected';
		}
		else{
			$image_name = basename($_FILES['filename']['name']);
			
			$verifyimg = getimagesize($_FILES['filename']['tmp_name']);
		   
			$pattern = "#^(image/)[^\s\n<]+$#i";
			if(!preg_match($pattern, $verifyimg['mime'])){
				die("Only image files are allowed!");
			}

			
			$uploaddir = '../images/product-images/';

			$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

			
			if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
				$img = resize_image($uploadfile, 720, 600);
				create_image($img, $uploadfile);
				echo "Image succesfully uploaded.";
			} else {
				echo "Image uploading failed.";
			}
		}

			$name=$_POST['name_product'];
			$category=$_POST['cat_product'];
			$description=$_POST['desc_product'];
			$stock=$_POST['qt_product'];
			$price=$_POST['price_product'];
			$discount=0;
			
			$P = new product($category, $name, $description, $image_name, $price, $discount, $stock);
			$P->setFeatured(0);

			if (isset($_POST['brand_product'])){
				$brand=$_POST['brand_product'];
				$P->setBrand($brand);
			}
			if (isset($_POST['featured'])){
				$P->setFeatured(1);
			}
			crudProduct::addProduct($P);
		header('Location: index.php');	
	
	}
	
	public function export(){
		
	}

}
?>