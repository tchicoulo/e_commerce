<?php

require_once "models/products.php";
require_once "models/category.php";

//définition des variables globales
global $action;
global $args;
global $method;

// Création d'un objet CategoriessModel
$category =new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
$categoriesListView = $category -> getAll();

$product = new ProductsModel(['id' => '' ,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]);

if(isset($action) && $action == 'getbycategory' ){
  $productsCategory = (int)$args[0];
  $productsCount = $product->count($productsCategory);
  $ProductsListView = $product->getByCategory($productsCategory);
}
else{
  $productsCategory = 0;
  $productsCount = $product->count('all');
  $ProductsListView = $product->getAll();
}

// Si l'utilisateur était sur une page categorie on le redirige vers la même page
if(isset($_POST['product_category']) && $_POST['product_category'] != 0){
  header("Location: ./home/getbycategory/".$_POST['product_category']);
}

// On compte combien il y a d'articles dans le panier
$cartCount = 0;

if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}

$content = "views/home.php";
require_once "views/layout.php";

?>
