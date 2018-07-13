<?php
require_once "models/products.php";
require_once "models/orders.php";
require_once "models/clients.php";
require_once "models/cart.php";

if(isset($_POST['order'])){

	$id_client   = (isset(htmlspecialchars($_POST['id_client'])))  ?  $_POST['id_client'] : 0;
	$nom_client  = (isset(htmlspecialchars($_POST['login'])))      ?  $_POST['login'] : 'default';
	$password    = (isset(htmlspecialchars($_POST['password'])))   ?  password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
	$prenom      = (isset(htmlspecialchars($_POST['prenom'])))     ?  $_POST['prenom'] : 'default';
	$nom         = (isset(htmlspecialchars($_POST['nom'])))        ?  $_POST['nom'] : 'default';
	$adresse     = (isset(htmlspecialchars($_POST['adresse'])))    ?  $_POST['adresse'] : 'default';
	$telephone   = (isset(htmlspecialchars($_POST['telephone'])))  ?  $_POST['telephone'] : '';
	$email       = (isset(htmlspecialchars($_POST['email'])))      ?  $_POST['email'] : 'default';
	$admin       = (isset(htmlspecialchars($_SESSION['admin'])))   ?  $_SESSION['admin'] : 'no';
	$date_commande = date("Y-m-d H:i:s");

	// ----- Objects creation -----//
	$client = new ClientsModel(['id' => $id_client ,'nom_client' => $nom_client, 'mot_de_passe' => $password, 'civilite' => '', 'prenom' => $prenom, 'nom' => $nom, 'adresse' => $adresse, 'telephone' => $telephone,'email' => $email,
	'admin' => $admin]);

	$order = new OrdersModel(['id' => 0 , 'date_commande' => $date_commande, 'id_client' => $id_client]);

	$cart = new CartsModel(['id' => 0 ,'id_commande' => 0, 'id_produit' => 0, 'quantite' => 0]);


	//---Update customer infos ----//
	$result = $client->update($client);

	// On re-définis les variables de session de l'utilisateur
	$_SESSION['id_client'] = $client->id();
	$_SESSION['login']     = $client->nom_client();
	$_SESSION['email']     = $client->email();
	$_SESSION['admin']     = $client->admin();
	$_SESSION['adresse']   = $client->adresse();
	$_SESSION['nom']       = $client->nom();
	$_SESSION['prenom']    = $client->prenom();
	$_SESSION['telephone'] = $client->telephone();

	if(isset($_SESSION['products']) && count($_SESSION['products']) > 0){
		//---Order addition to database ---//
		$result = $order->create($order);
		$order = $order->get($date_commande, (int)$id_client); // getting order id

		if($order){
			//---Cart articles addition to database ---//


			foreach($_SESSION['products'] as $product){
				$cart->setId_commande((int)$order->id());
				$cart->setId_produit((int)$product['id']);
				$cart->setQuantite((int)$product['quantity']);

				$cart->create($cart);
			}

			$checkoutList = $_SESSION["products"]; // saving cart list

			// When cart addition to db is done we emty the cart
			$_SESSION['total'] = 0;
			foreach($_SESSION["products"] as $product){
				unset($_SESSION["products"][$product['id']]);
			}

		}
		else{
			$result = '<p class="red"> Erreur lors de l\'ajout de la commande</p>';
		}
	}
	else{
		$result = '<p class="red">Votre panier est vide, impossible d\'ajouter la commande</p>';
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
