<?php

// resize image 

  function fn_resize($image_resource_id,$width,$height) {
          $target_width =300;
          $target_height =450;
          $target_layer=imagecreatetruecolor($target_width,$target_height);
          imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
          return $target_layer;
          }


//Upload images

function uploadImg(){

  for($i = 1; $i < 4; $i++){

  //$libelle = $_POST['libelle']; 

  // On répète 3 fois pour les 3 images

    $allowedExts = array("gif","jpg","jpeg","png");
    $temp = explode(".",$_FILES['img'.$i]['name']);
    $extension = end($temp);

    if((($_FILES['img'.$i]['type'] == 'image/gif')
    || ($_FILES['img'.$i]['type'] == 'image/jpeg')
    || ($_FILES['img'.$i]['type'] == 'image/jpg')
    || ($_FILES['img'.$i]['type'] == 'image/pjpg')
    || ($_FILES['img'.$i]['type'] == 'image/x-png')
    || ($_FILES['img'.$i]['type'] == 'image/png'))
    && ($_FILES['img'.$i]['size'] < 500000)
    && in_array($extension,$allowedExts)) {
      if ($_FILES['img'.$i]['error'] > 0){
        return false;
      } else {
        if (file_exists("img/product-img/".$_FILES['img'.$i]['name'])){
          return false;
        } else {

          //$file = $_FILES['img'.$i]['tmp_name']; 
          //$source_properties = getimagesize($file);
          //$image_type = $source_properties[2]; 
          //if( $image_type == IMAGETYPE_JPEG ) {   
          //$image_resource_id = imagecreatefromjpeg($file);  
          //$target_layer = fn_resize($image_resource_id,$//source_properties[0],$source_properties[1]);
          //imagejpeg($target_layer,"img/product-img/".$libelle.$i.".jpg")//;
          //}
          //elseif( $image_type == IMAGETYPE_GIF )  {  
          //$image_resource_id = imagecreatefromgif($file);
          //$target_layer = fn_resize($image_resource_id,$//source_properties[0],$source_properties[1]);
          //imagegif($target_layer,"img/product-img/".$libelle.$i.".gif");
          //}
          //elseif( $image_type == IMAGETYPE_PNG ) {
          //$image_resource_id = imagecreatefrompng($file); 
          //$target_layer = fn_resize($image_resource_id,$//source_properties[0],$source_properties[1]);
          //imagepng($target_layer,"img/product-img/".$libelle.$i.".png");
          //}

           move_uploaded_file($_FILES['img'.$i]['tmp_name'], "img/product-img/".$_FILES['img'.$i]['name']); 

          return true;
        }
      }
    } else {
      return false;
    }
  }
}
?>


