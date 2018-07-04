<?php

require_once "models/products.php";

$product = new ProductsModel(['id' => '' ,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]); 
$ProductsListView = $product->getAll();

$content = "views/home.php";
require_once "views/layout.php";

?>
