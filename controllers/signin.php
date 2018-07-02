<?php
require_once "models/clients.php";

if(isset($_POST['signin'])){

	//Création d'un nouveeau client vierge
	$client =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);

	//On recupère dans la base de donnée les informations du client
	$client = $client->get($_POST['login']);

	// Si le client existe et que le mot de passe correspond
	if($client && (password_verify($_POST['password'], $client->mot_de_passe()))){
		$_SESSION['login'] = $client->nom_client();
		$_SESSION['admin'] = $client->admin();
	}

	else{
		$result = '<span class="nav-link">Nom d\'utilisateur ou mot de passe incorrect</span>';
	}
}

$content = "views/home.php";
require_once "views/layout.php";
?>
