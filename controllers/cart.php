<?php
require_once "models/products.php";

// Add product to cart
if(isset($_POST['id_product'])){
  $product = new ProductsModel(['id' => '' ,'libelle' => '', 'marque' => '', 'id_Categorie' => 0]);
  $product = $product->get((int)$_POST['id_product']);

  $newProduct["id"] = $product->id();
  $newProduct["product_name"] = $product->libelle(); //fetch product name from database
  $newProduct["product_price"] = $product->prix();  //fetch product price from database
  $newProduct["product_img"] = $product->img1();

  if(isset($_SESSION["products"])){  //if session var already exist
    if(isset($_SESSION["products"][$_POST['id_product']])) //check item exist in products array
    {
      unset($_SESSION["products"][$_POST['id_product']]); //unset old item
    }
    else{
      $_SESSION['total'] += $newProduct["product_price"];
    }
  }
  else{
    $_SESSION['total'] = $newProduct["product_price"];
  }

  $_SESSION["products"][$_POST['id_product']] = $newProduct;
}

// Delete product from cart
if(isset($_POST["remove_id"]) && isset($_SESSION["products"]))
{
    $id_product = $_POST["remove_id"]; //get the product code to remove

    if(isset($_SESSION["products"][$id_product]))
    {
        $_SESSION['total'] -= $_SESSION["products"][$id_product]['product_price'];
        unset($_SESSION["products"][$id_product]);
    }

}

$cartCount = count($_SESSION["products"]);
require_once "controllers/home.php";
?>
