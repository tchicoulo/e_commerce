<?php

require_once "models/clients.php";

// Condition ternaire pour affecter les valeur envoyer via la methode POST, on leur affecte une valeur par défaut le cas échéant
$id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
$nom_client = (isset($_POST['nom_client'])) ?  $_POST['nom_client'] : 'default';

// Création d'un objet ClientsModel
$client =new ClientsModel(['id' => $id ,'nom_client' => $nom_client, 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);

if(isset($_POST['add'])){	 // Ajout d'un utilisateur
	$result = $client->create($client);
}

else if(isset($_POST['delete'])){	// Suppression d'un utilisateur
	$result = $client->delete((int)$_POST['id']);
}

else if(isset($_POST['update'])){ // Mise à jour d'un utilisateur
	$result = $client->update($client);
}

else if(isset($_POST['search'])){
	$searchedClient = $client->get($nom_client);
}

$ClientsListView= $client->getAll();

$content = "views/clients.php";
require_once "views/layout.php";

?>
