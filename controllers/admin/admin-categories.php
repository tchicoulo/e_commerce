<?php
// CATEGORIES ADMINISTRATION CONTROLLER

if(isset($action) && $action == 'showcategories'){
  // Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
  $id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
  $nom_categorie = (isset($_POST['nom_categorie'])) ?  $_POST['nom_categorie'] : 'default';

  // Création d'un objet CategoriessModel
  $category =new CategoriesModel(['id' => $id ,'nom_categorie' => $nom_categorie]);

  if(isset($_POST['add'])){	 // Ajout d'un produit
    $result = $category->create($category);
  }

  else if(isset($_POST['update'])){ // Mise à jour d'un produit
    $result = $category->update($category);
  }

  $adminList= $category->getAll();
}
else if(isset($action) && $action == 'addcategory'){
  // setting defaults values
  $verb = 'Ajouter';
  $id = 0;
  $nom_categorie = '';
}

else if(isset($action) && $action == 'editcategory'){
  $category =new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);

  if(isset($args[0])){
    $category = $category->get((int)$args[0]);

    // setting product values
    $verb = 'Modifier';
    $id = $category->id();
    $nom_categorie = $category->nom_categorie();
  }
}

else if(isset($action) && $action == 'deletecategory'){
  $category =new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);

  if($method == 'POST' && isset($args[0])){
    $result = $category->delete((int)$args[0]); // Suppression d'un produit
  }

  $adminList= $category->getAll();
}
?>
