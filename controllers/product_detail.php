<?php

// On compte combien il y a d'articles dans le panier
$cartCount = 0;

if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}

$content = "views/product_detail.php";
require_once "views/layout.php";

?>