<?php
// USERS ADMINISTRATION CONTROLLER

if (isset($action) && $action == "showusers") {

  $id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
  $nom_client = (isset($_POST['nom_client'])) ?  $_POST['nom_client'] : 'default';
  $password = (isset($_POST['password'])) ?  password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
  $prenom = (isset($_POST['prenom'])) ?  $_POST['prenom'] : 'default';
  $nom = (isset($_POST['nom'])) ?  $_POST['nom'] : 'default';
  $adresse = (isset($_POST['adresse'])) ?  $_POST['adresse'] : 'default';
  $telephone = (isset($_POST['telephone'])) ?  $_POST['telephone'] : 'default';
  $email = (isset($_POST['email'])) ?  $_POST['email'] : 'default';

  $client =new ClientsModel(['id' => $id ,'nom_client' => $nom_client, 'mot_de_passe' => $password, 'civilite' => '', 'prenom' => $prenom, 'nom' => $nom, 'adresse' => $adresse, 'telephone' => $telephone,'email' => $email,
  'admin' => '']);

  if(isset($_POST['add'])){	 // Ajout d'un produit
    $result = $client->create($client);
  }

  else if(isset($_POST['update'])){ // Mise à jour d'un produit
    $result = $client->update($client);
  }

  $ClientsListView= $client->getAll();
}
else if(isset($action) && $action == 'adduser'){
  // setting defaults values
  $verb = 'Ajouter';
  $id = 0;
  $nom_client = '';
  $password = '';
  $prenom = '';
  $nom = '';
  $adresse = '';
  $telephone = '';
  $email = '';
}

else if(isset($action) && $action == 'edituser'){
  $client =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);

  if(isset($args[0])){
    $client = $client->get((int)$args[0]);

    // setting product values
    $verb = 'Modifier';
    $id = $client->id();
    $nom_client = $client->nom_client();
    $password = 'default';
    $prenom = $client->prenom();
    $nom = $client->nom();
    $adresse = $client->adresse();
    $telephone = $client->telephone();
    $email = $client->email();
  }
}
else if (isset($action) && $action == "deleteuser") {
  $client =new ClientsModel(['id' => 0 ,'nom_client' => '', 'mot_de_passe' => '', 'civilite' => '', 'prenom' => '', 'nom' => '', 'adresse' => '', 'telephone' => '', 'email' => '']);

  if($method == 'POST' && isset($args[0])){
    $result = $client->delete((int)$args[0]); // Suppression d'un utilisateur
  }

  $ClientsListView= $client->getAll();
}
?>
