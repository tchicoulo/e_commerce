<?php

require_once "models/products.php";
require_once "models/category.php";

global $action;
global $args;
global $method;

// Création d'un objet CategoriessModel
$category =new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
$categoriesListView = $category -> getAll();

// On compte combien il y a d'articles dans le panier
$cartCount = 0;

if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}

$product_detail = new ProductsModel(['id' => '' ,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]);

if(isset($_GET['product'])){
  $product_detail = $product_detail->get((int)$_GET['product']);
}


$content = "views/product_detail.php";

require_once "views/layout.php";

?>
