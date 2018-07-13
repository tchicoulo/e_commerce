<?php
require_once "models/orders.php";
require_once "models/cart.php";

$id = (isset($_POST['id'])) ?  $_POST['id'] : 0;
$date_commande = (isset($_POST['date_commande'])) ?  $_POST['date_commande'] : 'default';
$id_client = (isset($_SESSION['id_client'])) ?  $_SESSION['id_client'] : 0;

// Création d'un objet ProductsModel
$orders =new OrdersModel(['id' => $id ,'date_commande' => $date_commande, 'id_client' => $id_client]);

$orderList= $orders->getByCustomer((int)$id_client);

// C'éation d'un objet CartsModel
$cart = new CartsModel(['id' => 0 ,'id_commande' => 0, 'id_produit' => 0, 'quantite' => 0]);

// On compte combien il y a d'articles dans le panier
$cartCount = 0;
if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}

$content = "views/profile.php";

require_once "views/layout.php";

?>
