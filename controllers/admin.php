<?php
require_once "models/products.php";
require_once "models/category.php";

global $action;
global $args;
global $method;

// PRODUCTS
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

  if($method == 'POST' && isset($args[0])){
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

// CATEGORIES
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

  if($method == 'POST' && isset($args[0])){
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

// ORDERS
if(isset($action) && $action == 'showorders'){
  // Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
  $id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
  $date_commande = (isset($_POST['date_commande'])) ?  $_POST['date_commande'] : 'default';
  $id_client = (isset($_POST['id_client'])) ?  $_POST['id_client'] : 'default';

  // Création d'un objet ProductsModel
  $product =new OrdersModel(['id' => $id ,'date_commande' => $date_commande, 'id_client' => $id_client]);

  if(isset($_POST['add'])){	 // Ajout d'un produit
    $result = $order->create($order);
  }

  else if(isset($_POST['update'])){ // Mise à jour d'un produit
    $result = $order->update($order);
  }

  $adminList= $order->getAll();
}
else if(isset($action) && $action == 'addorder'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $categories = $category->getAll();

  // setting defaults values
  $verb = 'Ajouter';
  $id = 0;
  $date_commande = '';
  $id_client = '';
}

else if(isset($action) && $action == 'editorder'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $order =new OrdersModel(['id' => 0 ,'date_commande' => '', 'id_client' => '']);

  $categories = $category->getAll();

  if($method == 'POST' && isset($args[0])){
    $product = $product->get((int)$args[0]);

    // setting order values
    $verb = 'Modifier';
    $id = $order->id();
    $date_commande = $order->date_commande();
    $id_client = $order->id_client();
  }
}

else if(isset($action) && $action == 'deleteproduct'){
  $order =new OrdersModel(['id' => 0 ,'date_commande' => '', 'id_client' => '']);

  if($method == 'POST' && isset($args[0])){
    $result = $order->delete((int)$args[0]); // Suppression d'une commande
  }

  $adminList= $order->getAll();
}

// CLIENTS

if (isset($action) && $action == "showclients") {
  $client =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);
  $ClientsListView= $client->getAll();
}

$content = "views/admin.php";
require_once "views/admin_layout.php";

?>
