<?php
require_once '../img_resize.php';
require_once('/../../models/products/crudProduct.php');
require_once('/../../models/products/crudBrand.php');

if (isset($_GET['action'])){
		if ($_GET['action'] == 'addBrand'){
			if (isset($_GET['name'])){
				$add_brand = $_GET['name'];
				crudBrand::addBrand($add_brand);
				$brands = crudBrand::selectBrands();
				foreach($brands as $brand){ 															 
					$value = $brand->getName();
					echo '<option value="">' . $brand->getName() . '</option>';
				}
			}
		}
		exit();
	}
	
if($_FILES['filename']['error'] == 4){
    //echo 'no image file was selected';
	$image_name = "no_img.png";
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
        $img = resize_image($uploadfile, 720, 600);
        create_image($img, $uploadfile);
        echo "Image succesfully uploaded.";
    } else {
        echo "Image uploading failed.";
    }
}

	if (isset($_POST['name_product'], $_POST['cat_product'], $_POST['price_product'])){
		$name=filter_input(INPUT_POST, 'name_product', FILTER_SANITIZE_STRING);
		$category=filter_input(INPUT_POST, 'cat_product', FILTER_SANITIZE_STRING);
		$description=filter_input(INPUT_POST, 'desc_product', FILTER_SANITIZE_STRING);
		$stock=filter_input(INPUT_POST, 'qt_product', FILTER_SANITIZE_NUMBER_INT);
		$price=filter_input(INPUT_POST, 'price_product', FILTER_SANITIZE_NUMBER_FLOAT);
		$discount=0;
	
	
	
		$P = new product($category, $name, $description, $image_name, $price, $discount, $stock);
		$P->setFeatured(0);

		if (isset($_POST['brand_product'])){
			$brand=filter_input(INPUT_POST, 'brand_product', FILTER_SANITIZE_STRING);
			$P->setBrand($brand);
		}
		if (isset($_POST['featured'])){
			$P->setFeatured(1);
		}
		if (isset($_POST['promotion'])){
			$promo = filter_input(INPUT_POST, 'promotion', FILTER_SANITIZE_NUMBER_INT);
			if ($promo == 1)
				$promo = null;
			$P->setPromo($promo);
		}
		crudProduct::addProduct($P);
	
	}
	header('Location: ../../index.php?controller=products&action=show');	
?>