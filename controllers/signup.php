<?php
require_once "models/clients.php";

if(isset($_POST['signup'])){

	$client =new ClientsModel(['id' => 0 ,'nom_client' => $_POST['login'], 'mot_de_passe' => $_POST['password'], 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => $_POST['email']]);

	$result = $client->create($client);

	$_SESSION['login'] = $client->nom_client();
}

header("Location: ./home");
?>