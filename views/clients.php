<?php
	echo '<form method="post" action="/Forum-Pirate/index.php/inscription" enctype="multipart/form-data">
	<fieldset><legend>Ajout Client</legend>
	<label for="nom_utilisateur">Nom utilisateur :</label>  <input name="nom_utilisateur" type="text" id="nom_utilisateur" placeholder= ""/> <br />
	</fieldset>
	<p><input  type="submit" value="Ajouter" name="ajout" /></p>
	</form>';

foreach ($ClientsListView as $clients){
  echo "<br/>-".$clients["nom_client"];
}



 ?>
