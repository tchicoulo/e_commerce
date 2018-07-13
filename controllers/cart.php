<?php
require_once "models/products.php";
global $action;

// Add product to cart
if(isset($_POST['id_product'])){
  $product = new ProductsModel(['id' => 0,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]);
  $product = $product->get((int)$_POST['id_product']);

  if($product){

    $newProduct["id"]               = $product->id();
    $newProduct["product_name"]     = $product->libelle();
    $newProduct["product_category"] = $product->getCategory();
    $newProduct["product_price"]    = $product->prix();
    $newProduct["product_img"]      = $product->img1();
    $newProduct["quantity"]         = 0;

    if(isset($_SESSION["products"])){  //if session var already exist
      if(isset($_SESSION["products"][$_POST['id_product']])) //check item exist in products array
      {
        $_SESSION['total'] += $newProduct["product_price"];
        $newProduct["quantity"] = $_SESSION["products"][$_POST['id_product']]['quantity']+1;
        unset($_SESSION["products"][$_POST['id_product']]); //unset old item
      }
      else{
        $newProduct["quantity"] = 1;
        $_SESSION['total'] += $newProduct["product_price"];
      }
    }
    else{
      $newProduct["quantity"] = 1;
      $_SESSION['total'] = $newProduct["product_price"];
    }

    $_SESSION["products"][$_POST['id_product']] = $newProduct;
  }
}

// Delete product from cart
if(isset($_POST["remove_id"]) && isset($_SESSION["products"]))
{
  $id_product = $_POST["remove_id"]; //get the product id to remove

  if(isset($_SESSION["products"][$id_product]) && $_SESSION["products"][$id_product]['quantity'] <= 1)
  {
    $_SESSION['total'] -= $_SESSION["products"][$id_product]['product_price'];
    unset($_SESSION["products"][$id_product]);
  }
  elseif(isset($_SESSION["products"][$id_product])){
    $_SESSION['total'] -= $_SESSION["products"][$id_product]['product_price'];
    $_SESSION["products"][$id_product]['quantity']--;
  }
}

// Empty cart
if(isset($action) && $action == 'emptycart' && isset($_SESSION["products"]))
{
  $_SESSION['total'] = 0;
  foreach($_SESSION["products"] as $product){
    unset($_SESSION["products"][$product['id']]);
  }
}

require_once "controllers/home.php";
?>
