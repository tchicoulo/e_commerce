<?php
require_once "models/products.php";
require_once "models/category.php";
require_once "models/orders.php";
require_once "models/clients.php";

require_once "controllers/upload.php";

global $action;
global $args;
global $method;

// PRODUCTS
require_once "admin/admin-products.php";

// CATEGORIES
require_once "admin/admin-categories.php";

// ORDERS
require_once "admin/admin-orders.php";

// USERS
require_once "admin/admin-users.php";


// How many item in cart


$cartCount = 0;
if(isset($_SESSION["products"]) && count($_SESSION["products"]) > 0){
  foreach($_SESSION["products"] as $product){
    $cartCount = $cartCount + $product['quantity'];
  }
}

$content = "views/admin/admin.php";
require_once "views/admin/admin-layout.php";

?>
