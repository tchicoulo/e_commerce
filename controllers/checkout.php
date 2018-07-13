<?php
require_once "models/orders.php";
require_once "models/clients.php";
require_once "models/cart.php";

if(isset($_POST['order'])){

	$id_client = (isset($_POST['id_client'])) ?  $_POST['id_client'] : 0;
	$nom_client= (isset($_POST['login'])) ?  $_POST['login'] : 'default';
	$password   = (isset($_POST['password'])) ?  password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
	$prenom = (isset($_POST['prenom'])) ?  $_POST['prenom'] : 'default';
	$nom = (isset($_POST['nom'])) ?  $_POST['nom'] : 'default';
	$adresse = (isset($_POST['adresse'])) ?  $_POST['adresse'] : 'default';
	$telephone = (isset($_POST['telephone'])) ?  $_POST['telephone'] : '';
	$email = (isset($_POST['email'])) ?  $_POST['email'] : 'default';


	// ----- Objects creation -----//
	$client = new ClientsModel(['id' => $id_client ,'nom_client' => $nom_client, 'mot_de_passe' => $password, 'civilite' => '', 'prenom' => $prenom, 'nom' => $nom, 'adresse' => $adresse, 'telephone' => $telephone,'email' => $email, 'admin' => '']);

	$order = new OrdersModel(['id' => 0 , 'date_commande' => date('Y-m-d'), 'id_client' => $id_client]);

	$cart = new CartsModel(['id' => 0 ,'id_commande' => 0, 'id_produit' => 0, 'quantite' => 0);


	//---Update customer infos ----//
    $result = $client->update($client);

    //---Order addition to database ---//
    $result = $order->create($order);

    //---Cart articles addition to database ---//
    if(isset($_SESSION['products'])){

    	foreach($_SESSION['products'] as $product){
    		
    	}
    }
}


// On compte combien il y a d'articles dans le panier
$cartCount = 0;
if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
	foreach($_SESSION["products"] as $product){
		$cartCount = $cartCount + $product['quantity'];
	}
}

$content = "views/checkout.php";
require_once "views/layout.php";

?>