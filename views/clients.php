<?php
require_once "views/navbar.php";

// Formulaire d'ajout d'un utilisateur
echo '<form method="post" action="clients" enctype="multipart/form-data">
<fieldset><legend>Ajout Client</legend>
<label for="nom_utilisateur">Nom utilisateur :</label>  <input name="nom_client" type="text" id="nom_client" placeholder= "Votre Nom"/> <br />
</fieldset>
<p><input  type="submit" value="Ajouter" name="add" /></p>
</form>';

if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

// Formulaire de recherche
echo '<form method="post" action="clients" enctype="multipart/form-data">
<label for="nom_utilisateur">Rechercher un utilisateur :</label>  <input name="nom_client" type="text" id="nom_client" placeholder= "Nom d\'utilisateur"/>
<input  type="submit" value="Rechercher" name="search" />
</form>';

if(isset($searchedClient) && $searchedClient != false){
	echo '<p>L\'utilisateur '.$searchedClient->nom_client().' existe.</p>';
}
else if(isset($searchedClient) && $searchedClient == false){
	echo '<p class="red">Aucun résultat.</p>';
}

// Affichage de la liste des utilisateurs
foreach ($ClientsListView as $clients){
	echo "<br/>-".$clients["nom_client"];

	echo '<form method="post" action="clients" enctype="multipart/form-data">';
	echo '<input  type="hidden" value="'.$clients["id"].'" name="id" />';
	echo '<input  type="text" value="'.$clients["nom_client"].'" name="nom_client" />';
	echo '<input  type="submit" value="Modifier" name="update" />';
	echo '</form>';

	echo '<form method="post" action="clients" enctype="multipart/form-data">';
	echo '<input  type="hidden" value="'.$clients["id"].'" name="id" />';
	echo '<input  type="submit" value="Supprimer" name="delete" />';
	echo '</form>';
}

?>
