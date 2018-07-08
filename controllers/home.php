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
  $productsCount = $product->count((int)$args[0]);
  $ProductsListView = $product->getByCategory((int)$args[0]);
}
else{
  $productsCount = $product->count('all');
  $ProductsListView = $product->getAll();
}

$content = "views/home.php";
require_once "views/layout.php";

?>
