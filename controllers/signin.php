<?php
require_once "models/clients.php";
require_once "models/products.php";


if(isset($_POST['signin'])){

	$password = htmlspecialchars($_POST['password']);
	$email    = htmlspecialchars($_POST['email']);

	//Création d'un nouveeau client vierge
	$client =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);

	//On recupère dans la base de donnée les informations du client
	$client = $client->get($email);

	// Si le client existe et que le mot de passe correspond
	if($client && (password_verify($password, $client->mot_de_passe()))){
		// On définis les variables de session de l'utilisateur pour le connecter
		$_SESSION['id_client'] = $client->id();
		$_SESSION['login'] = $client->nom_client();
		$_SESSION['email'] = $client->email();
		$_SESSION['admin'] = $client->admin();
		$_SESSION['adresse'] = $client->adresse();
		$_SESSION['nom'] = $client->nom();
		$_SESSION['prenom'] = $client->prenom();
		$_SESSION['telephone'] = $client->telephone();
	}



	else{
		$result = '<span class="nav-link">Nom d\'utilisateur ou mot de passe incorrect</span>';
	}
}

header("Location: ./home");
?>
