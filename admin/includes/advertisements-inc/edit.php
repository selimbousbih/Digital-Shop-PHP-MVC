<?PHP
require_once('../../models/advertisements/classAdv.php');
require_once('../../models/advertisements/crudAdv.php');
    
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

    
    $uploaddir = 'C:/wamp64/www/GARBYS MATOS/images/adv/'; //change this 

    $uploadfile = $uploaddir . basename($_FILES['filename']['name']);

    
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
       
        echo "Image succesfully uploaded.";
    } else {
        echo "Image uploading failed.";
    }
}
    
    $valeur=$_GET['id'];
    $description = $_POST['description'];
    $url=$_POST['url'];
    $sdate=$_POST['startdate'];
    $edate=$_POST['enddate'];
    crudAdv::updateAdvertisement($valeur,$sdate,$edate,$image_name,$description,$url);   

header('Location: ../../index.php?controller=advertisement&action=show');
?>