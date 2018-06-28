<?php

require_once "models/products.php";

// Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
$id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
$libelle = (isset($_POST['libelle'])) ?  $_POST['libelle'] : 'default';
$marque = (isset($_POST['marque'])) ?  $_POST['marque'] : 'default';
$id_Categorie = (isset($_POST['id_Categorie'])) ?  $_POST['id_Categorie'] : 1;

// Création d'un objet ProductsModel
$product =new ProductsModel(['id' => $id ,'libelle' => $libelle, 'marque' => $marque, 'id_Categorie' => $id_Categorie]);

if(isset($_POST['add'])){	 // Ajout d'un produit
	$result = $product->create($product);
}

else if(isset($_POST['delete'])){	// Suppression d'un produit
	$result = $product->delete((int)$_POST['id']);
}

else if(isset($_POST['update'])){ // Mise à jour d'un produit
	$result = $product->update($product);
}

else if(isset($_POST['search'])){
	$searchedProduct = $product->get($libelle);
}

$ProductsListView= $product->getAll();

$content = "views/products.php";
require_once "views/layout.php";

?>
