<?php
require_once('../../models/gallery/crudPhoto.php');

if ($_GET["id"]){
	$id = $_GET["id"];
	crudPhoto::remove($id);
	$name = crudPhoto::select($id);
	$uploaddir = '../../../images/gallery/';
	$file = $uploaddir  . $name;
	 if (file_exists($file)) {
		 echo 1;
		 chmod($file, 0777);
        unlink($file);
	 }
	//header('Location: ../../index.php?controller=gallery&action=show');	
}

?>