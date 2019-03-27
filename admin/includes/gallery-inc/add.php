<?php
require_once '../img_resize.php';
require_once('/../../models/gallery/crudPhoto.php');

function str_random($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

if($_FILES['filename']['error'] == 4){
    header('Location: ../../index.php?controller=gallery&action=show');	
	exit();
}
else{
    $image_name = basename($_FILES['filename']['name']);
    
    $verifyimg = getimagesize($_FILES['filename']['tmp_name']);
   
    $pattern = "#^(image/)[^\s\n<]+$#i";
    if(!preg_match($pattern, $verifyimg['mime'])){
        die("Only image files are allowed!");
    }

    
    $uploaddir = '../../../images/gallery/';
	$extension = pathinfo($image_name, PATHINFO_EXTENSION);
	
	do {
		$fname = str_random(10) . '.' . $extension;
	} while(file_exists($uploaddir . '/' . $fname));
	
    $uploadfile = $uploaddir . $fname;

    
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
        echo "Image succesfully uploaded.";
    } else {
        echo "Image uploading failed.";
    }

		$P = new photo($fname);
		crudPhoto::insert($P);}


	header('Location: ../../index.php?controller=gallery&action=show');	
?>