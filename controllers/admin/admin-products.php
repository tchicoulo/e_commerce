<?php
// PRODUCTS ADMINISTRATION CONTROLLER

if(isset($action) && $action == 'showproducts'){
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

  else if(isset($_POST['update'])){ // Mise à jour d'un produit
    $result = $product->update($product);
  }

  $adminList= $product->getAll();
}
else if(isset($action) && $action == 'addproduct'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $categories = $category->getAll();

  // setting defaults values
  $verb = 'Ajouter';
  $id = 0;
  $libelle = '';
  $marque = '';
  $id_categorie = 1;
}

else if(isset($action) && $action == 'editproduct'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $product =new ProductsModel(['id' => 0 ,'libelle' => '', 'marque' => '', 'id_Categorie' =>0]);

  $categories = $category->getAll();

  if(isset($args[0])){
    $product = $product->get((int)$args[0]);

    // setting product values
    $verb = 'Modifier';
    $id = $product->id();
    $libelle = $product->libelle();
    $marque = $product->marque();
    $id_categorie = $product->id_Categorie();
  }
}

else if(isset($action) && $action == 'deleteproduct'){
  $product =new ProductsModel(['id' => 0 ,'libelle' => '', 'marque' => '', 'id_Categorie' =>0]);

  if($method == 'POST' && isset($args[0])){
    $result = $product->delete((int)$args[0]); // Suppression d'un produit
  }

  $adminList= $product->getAll();
}
?>
