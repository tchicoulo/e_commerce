<?php
require_once "models/clients.php";

if(isset($_POST['signup'])){

	$client =new ClientsModel(['id' => 0 ,'nom_client' => $_POST['login'], 'mot_de_passe' => password_hash($_POST['password'], PASSWORD_DEFAULT), 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => $_POST['email']]);

	$result = $client->create($client);

	$_SESSION['login'] = $client->nom_client();
	$_SESSION['email'] = $client->email();
	$_SESSION['admin'] = $client->admin();
}

header("Location: ./home");
?>


