<?php
require_once "models/products.php";

############# add products to session #########################
if(isset($_POST["id_product"]))
{
    foreach($_POST as $key => $value){
        $new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING); //create a new product array
    }

    //we need to get product name and price from database.
    $product =new ProductsModel(['id' => $id ,'libelle' => $libelle, 'marque' => $marque, 'id_Categorie' => $id_Categorie]);
    $product->get((int)$_POST["id_product"]);

    if($product){
        $new_product["product_name"] = $product->libelle(); //fetch product name from database
        $new_product["product_price"] = $product->prix();  //fetch product price from database

        if(isset($_SESSION["products"])){  //if session var already exist
            if(isset($_SESSION["products"][$new_product['id_product']])) //check item exist in products array
            {
                unset($_SESSION["products"][$new_product['id_product']]); //unset old item
            }
        }

        $_SESSION["products"][$new_product['id_product']] = $new_product; //update products with new item array
    }

    $cartCount = count($_SESSION["products"]); //count total items
    die(json_encode(array('items'=>$cartCount))); //output json

}

?>
