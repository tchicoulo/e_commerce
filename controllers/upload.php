<?php
//Upload images
function uploadImg(){
  for($i = 1; $i < 4; $i++){ // On répète 3 fois pour les 3 images

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
        if (file_exists("img/product-img/" . $_FILES['img'.$i]['name'])){
          return false;
        } else {
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
