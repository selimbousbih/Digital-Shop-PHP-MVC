<?php
function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $ext = pathinfo($file, PATHINFO_EXTENSION);
    $src = '';
    
    if (in_array(strtolower($ext), array('jpg', 'jpeg'))){
        $src = imagecreatefromjpeg($file);
    }
    else if (strtolower($ext) == 'png'){
        $src = imagecreatefrompng($file);
    }
    else if (strtolower($ext) == 'gif'){
        $src = imagecreatefromgif($file);
    }
    else{
        $src = imagecreatefromjpeg($file);
    }
        
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

function create_image($img, $uploadfile){
    $ext = pathinfo($uploadfile, PATHINFO_EXTENSION);
    
    if (in_array(strtolower($ext), array('jpg', 'jpeg'))){
        imagejpeg($img, $uploadfile);
    }
    else if (strtolower($ext) == 'png'){
        imagepng($img, $uploadfile);
    }
    else if (strtolower($ext) == 'gif'){
        imagegif($img, $uploadfile);
    }
    else{
        imagejpeg($img, $uploadfile);
    }
}
?>