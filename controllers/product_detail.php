<?php

require_once "models/products.php";

global $action;
global $args;
global $method;

// On compte combien il y a d'articles dans le panier
$cartCount = 0;

if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}


$product = new ProductsModel(['id' => '' ,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]);

$ProductsListView = $product->getAll();








$content = "views/product_detail.php";

require_once "views/layout.php";

?>