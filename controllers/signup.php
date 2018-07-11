<?php
require_once "models/clients.php";

if(isset($_POST['signup'])){

	$login    = htmlspecialchars($_POST['login']);
	$password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
	$email    = htmlspecialchars($_POST['email']);



	$client =new ClientsModel(['id' => 0 ,'nom_client' => $login, 'mot_de_passe' => $password, 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => $email ]);

	$result = $client->create($client);

	if($result == '<p class="green">L\'utilisateur '.$client->nom_client().' à bien été ajouté.</p>'){
		$_SESSION['login'] = $client->nom_client();
		$_SESSION['email'] = $client->email();
		$_SESSION['admin'] = $client->admin();
	}
}

header("Location: ./home");
?>
