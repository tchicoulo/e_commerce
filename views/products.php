<?php
require_once "views/navbar.php";

// Formulaire d'ajout d'un utilisateur
echo '<form method="post" action="products" enctype="multipart/form-data">
<fieldset><legend>Ajout Produit</legend>
<label for="libelle">Libelle :</label>  <input name="libelle" type="text" id="libelle" placeholder= "Votre Produit"/> <br />
</fieldset>
<p><input  type="submit" value="Ajouter" name="add" /></p>
</form>';

if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

// Formulaire de recherche
echo '<form method="post" action="products" enctype="multipart/form-data">
<label for="libelle">Rechercher un produit :</label>  <input name="libelle" type="text" id="libelle" placeholder= "Nom du produit"/>
<input  type="submit" value="Rechercher" name="search" />
</form>';

if(isset($searchedProduct) && $searchedProduct != false){
	echo '<p>Le produit '.$searchedProduct->libelle().' existe.</p>';
}
else if(isset($searchedProduct) && $searchedProduct == false){
	echo '<p class="red">Aucun résultat.</p>';
}

// Affichage de la liste des produits
foreach ($ProductsListView as $products){
	echo "<br/>-".$products["libelle"];

	echo '<form method="post" action="products" enctype="multipart/form-data">';
	echo '<input  type="hidden" value="'.$products["id"].'" name="id" />';
	echo '<input  type="text" value="'.$products["libelle"].'" name="libelle" />';
	echo '<input  type="submit" value="Modifier" name="update" />';
	echo '</form>';

	echo '<form method="post" action="products" enctype="multipart/form-data">';
	echo '<input  type="hidden" value="'.$products["id"].'" name="id" />';
	echo '<input  type="submit" value="Supprimer" name="delete" />';
	echo '</form>';
}

?>
