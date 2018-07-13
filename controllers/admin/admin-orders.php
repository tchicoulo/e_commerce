<?php
// ORDERS ADMINISTRATION CONTROLLER

if(isset($action) && $action == 'showorders'){
  // Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
  $id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
  $date_commande = (isset($_POST['date_commande'])) ?  $_POST['date_commande'] : 'default';
  $id_client = (isset($_POST['id_client'])) ?  $_POST['id_client'] : 0;

  // Création d'un objet ProductsModel
  $orderAdmin =new OrdersModel(['id' => $id ,'date_commande' => $date_commande, 'id_client' => $id_client]);

  if(isset($_POST['add'])){	 // Ajout d'un produit
    $result = $orderAdmin->create($orderAdmin);
  }

  else if(isset($_POST['update'])){ // Mise à jour d'un produit
    $result = $orderAdmin->update($orderAdmin);
  }

  $adminList= $orderAdmin->getAll();
}
else if(isset($action) && $action == 'addorder'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $categories = $category->getAll();

  // setting defaults values
  $verb = 'Ajouter';
  $id = 0;
  $date_commande = '';
  $id_client = 0;
}

else if(isset($action) && $action == 'editorder'){
  $category = new CategoriesModel(['id' => 0 ,'nom_categorie' => '']);
  $orderAdmin =new OrdersModel(['id' => 0 ,'date_commande' => '', 'id_client' => '']);

  $categories = $category->getAll();

  if(isset($args[0])){
    $orderAdmin = $orderAdmin->get(0, (int)$args[0]);

    // setting order values
    $verb = 'Modifier';
    $id = $orderAdmin->id();
    $date_commande = $orderAdmin->date_commande();
    $id_client = $orderAdmin->id_client();
  }
}

else if(isset($action) && $action == 'deleteorder'){
  $orderAdmin =new OrdersModel(['id' => 0 ,'date_commande' => '', 'id_client' => '']);

  if($method == 'POST' && isset($args[0])){
    $result = $orderAdmin->delete((int)$args[0]); // Suppression d'une commande
  }

  $adminList= $orderAdmin->getAll();
}
?>
