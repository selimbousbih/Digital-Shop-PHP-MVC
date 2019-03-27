<?php
require_once 'db_connect.php';
require_once('../models/crudProduct.php');
require_once 'img_resize.php';

if (isset($_GET["action"],$_GET["pid"])){
	$action = $_GET["action"];
	$id = $_GET["pid"];
	$crud = new crudProduct();
	$product = $crud->selectProduct($id);
	
	switch ($action)
	{
		case 'delete':
			$crud->deleteProduct($id);
			header('Location: ../?page=products');
		break;
		
		case 'edit':
		{
			if($_FILES['filename']['error'] == 4){
				echo 'no image file was selected';
				$image_name = $product->getImage();
			}
			else{
				$image_name = basename($_FILES['filename']['name']);
				
				$verifyimg = getimagesize($_FILES['filename']['tmp_name']);
			   
				$pattern = "#^(image/)[^\s\n<]+$#i";
				if(!preg_match($pattern, $verifyimg['mime'])){
					die("Only image files are allowed!");
				}

				
				$uploaddir = '../../images/product-images/';

				$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

				
				if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
					$img = resize_image($uploadfile, 250, 320);
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
				if (isset($_POST['brand_product'])){
					$brand=$_POST['brand_product'];
				}

				$crud = new crudProduct();
				$crud->updateProduct($id, $category, $name, $description, $image_name, $price, $discount, $stock, $brand);
				header('Location: ../?page=products');
		}
			
		break;
	}
}
else{
	header('Location: ../?page=products');
}
?>