<?php
// PRODUCTS ADMINISTRATION CONTROLLER

if(isset($action) && $action == 'showproducts'){
  // Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
  $id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
  $libelle = (isset($_POST['libelle'])) ?  $_POST['libelle'] : 'default';
  $marque = (isset($_POST['marque'])) ?  $_POST['marque'] : 'default';
  $description = (isset($_POST['description'])) ?  $_POST['description'] : '';
  $id_Categorie = (isset($_POST['id_Categorie'])) ?  $_POST['id_Categorie'] : 1;
  $stock = (isset($_POST['stock'])) ?  $_POST['stock'] : 0;
  $prix = (isset($_POST['prix'])) ?  $_POST['prix'] : 0;
  $img1 = (isset($_FILES['img1']) && $_FILES['img1']['name'] != '') ?  'img/product-img/'.$_FILES['img1']['name'] : 'img/logo.png';
  $img2 = (isset($_FILES['img2']) && $_FILES['img2']['name'] != '') ?  'img/product-img/'.$_FILES['img2']['name'] : 'img/logo.png';
  $img3 = (isset($_FILES['img3']) && $_FILES['img3']['name'] != '') ?  'img/product-img/'.$_FILES['img3']['name'] : 'img/logo.png';


  // Création d'un objet ProductsModel
  $product =new ProductsModel(['id' => $id ,'libelle' => $libelle, 'marque' => $marque, 'description' => $description, 'id_Categorie' => $id_Categorie, 'stock' => $stock, 'prix' => $prix,
  'img1' => $img1, 'img2' => $img2, 'img3' => $img3]);

  if(isset($_POST['add'])){	 // Ajout d'un produit

    uploadImg();
    $result = $product->create($product);
  }

  else if(isset($_POST['update'])){ // Mise à jour d'un produit


    uploadImg();
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
  $description = '';
  $id_Categorie = 1;
  $stock = 0;
  $prix = 0;
  $img1 = 'img/logo.png';
  $img2 = 'img/logo.png';
  $img3 = 'img/logo.png';

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
    $description = $product->description();
    $id_Categorie = $product->id_Categorie();
    $stock = $product->stock();
    $prix = $product->prix();
    $img1 = $product->img1();
    $img2 = $product->img2();
    $img3 = $product->img3();
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
