<?php
require_once('../../models/products/crudProduct.php');
require_once '../img_resize.php';

if (isset($_GET["action"],$_GET["pid"])){
	$action = $_GET["action"];
	$id = $_GET["pid"];
	$product = crudProduct::selectProduct($id);
	
	switch ($action)
	{
		case 'delete':
			crudProduct::deleteProduct($id);
			header('Location: ../../?controller=products&action=show');
		break;
		
		case 'edit':
		{
			if($_FILES['filename']['error'] == 4){
				$image_name = $product->getImage();
			}
			else{
				$image_name = basename($_FILES['filename']['name']);
				
				$verifyimg = getimagesize($_FILES['filename']['tmp_name']);
			   
				$pattern = "#^(image/)[^\s\n<]+$#i";
				if(!preg_match($pattern, $verifyimg['mime'])){
					die("Only image files are allowed!");
				}

				
				$uploaddir = '../../../images/product-images/';

				$uploadfile = $uploaddir . basename($_FILES['filename']['name']);

				
				if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
					$img = resize_image($uploadfile, 250, 320);
					create_image($img, $uploadfile);
					echo "Image succesfully uploaded.";
				} else {
					echo "Image uploading failed.";
				}
			}

				$name=filter_input(INPUT_POST, 'name_product', FILTER_SANITIZE_STRING);
				$category=filter_input(INPUT_POST, 'cat_product', FILTER_SANITIZE_STRING);
				$description=filter_input(INPUT_POST, 'desc_product', FILTER_SANITIZE_STRING);
				$stock=filter_input(INPUT_POST, 'qt_product', FILTER_SANITIZE_NUMBER_INT);
				$price=filter_input(INPUT_POST, 'price_product', FILTER_SANITIZE_NUMBER_FLOAT);
				$discount=0;
				
				if (isset($_POST['brand_product'])){
					$brand=filter_input(INPUT_POST, 'brand_product', FILTER_SANITIZE_STRING);
				}
				if (isset($_POST['promotion'])){
					$promo = filter_input(INPUT_POST, 'promotion', FILTER_SANITIZE_NUMBER_INT);
					if ($promo == 1)
						$promo = null;
				}
				
				if (isset($_POST['featured'])){
					$featured = 1;
				}
				else
					$featured=0;
				
				
				crudProduct::updateProduct($id, $category, $name, $description, $image_name, $price, $promo, $stock, $brand, $featured);
				
				header('Location: ../../index.php?controller=products&action=show');	
		}
			
		break;
	}
}
else{
	header('Location: ../../index.php?controller=products&action=show');	
}
?>