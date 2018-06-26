<?php

require_once "models/clients.php";

if(isset($_POST['ajout'])){

	$clients =new ClientsModel(['id' => 0 ,'nom_client' => $_POST[''], 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);
	$ClientsListView= $clients->getAll();

}

$clients =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);
$ClientsListView= $clients->getAll();

$content = "views/clients.php";
require_once "views/layout.php";

?>
