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

    
    $uploaddir = '../../../images/adv/'; //change this 

    $uploadfile = $uploaddir . basename($_FILES['filename']['name']);

    
    if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
     
        echo "Image succesfully uploaded.";
    } else {
        echo "Image uploading failed.";
    }
}

$doc=new Advertisement(1,$_POST['startdate'],$_POST['enddate'],$image_name,$_POST['description'],$_POST['url']);
crudAdv::addAdv($doc);
header('Location: ../../index.php?controller=advertisement&action=show');

?>