<?php

require_once "models/orders.php";

// Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
$id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
$date_commande = (isset($_POST['date_commande'])) ?  $_POST['date_commande'] : 'default';
$marque = (isset($_POST['id_client'])) ?  $_POST['id_client'] : 'default';

// Création d'un objet OrdersModel
$product =new OrdersModel(['id' => $id ,'date_commande' => $date_commande, 'id_client' => $id_client]);

if(isset($_POST['add'])){	 // Ajout d'une commande
	$result = $order->create($order);
}

else if(isset($_POST['delete'])){	// Suppression d'une commande
	$result = $order->delete((int)$_POST['id']);
}

else if(isset($_POST['update'])){ // Mise à jour d'une commande
	$result = $order->update($order);
}

else if(isset($_POST['search'])){
	$searchedOrder = $order->get($date_commande);
}

$OrdersListView= $order->getAll();

$content = "views/orders.php";
require_once "views/layout.php";

?>
