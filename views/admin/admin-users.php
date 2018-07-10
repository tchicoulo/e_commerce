<?php
// USERS ADMINISTRATION VIEWuser

if($action == 'showusers' || $action == 'deleteuser'){
  echo '<a href="/sheekstore/e_commerce/index.php/admin/adduser/"><button class="btn btn-lg btn-primary btn-block" name="addclient">Ajouter un client</button></a><br /><br />';

  if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

  echo '<table class="table table-striped table-sm">
  <thead>
  <tr>
  <th>Id</th>
  <th>Nom d\'utilisateur</th>
  <th>Prénom</th>
  <th>Nom</th>
  <th>Email</th>
  <th>Admin</th>
  <th>Editer</th>
  <th>Supprimer</th>
  </tr>
  </thead>
  <tbody>
  ';

  foreach($ClientsListView as $client){
    echo '<tr>
    <td>'.$client['id'].'</td>
    <td><a href="/sheekstore/e_commerce/index.php/admin/edituser/'.$client['id'].'">'.$client['nom_client'].'</a></td>
    <td>'.$client['prenom'].'</td>
    <td>'.$client['nom'].'</td>
    <td>'.$client['email'].'</td>
    <td>'.$client['admin'].'</td>
    <form method="post">
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/edituser/'.$client['id'].'" src="/sheekstore/e_commerce/img/edit.png" alt="Icone d\'édition" class="icon" /></td>
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/deleteuser/'.$client['id'].'" src="/sheekstore/e_commerce/img/delete.png" alt="Icone de suppression" class="icon" /></td>
    </form>';
  }

  echo '</tbody>
  </table>';
}
else if($action =='adduser' || $action =='edituser'){
  echo '<form class="form-signin" action="/sheekstore/e_commerce/index.php/admin/showusers" method="post">
  <h1 class="h3 mb-3 font-weight-normal">'.$verb.' un utilisateur</h1>
  <input type="hidden" name="id" value="'.$id.'">
  <input type="text" class="form-control" placeholder="Nom d\'utilisateur" name="nom_client" value="'.$nom_client.'" required autofocus><br/>
  <label for="inputName" class="sr-only">Nom d\'utilisateur</label>
  <input type="text" class="form-control" placeholder="Nom d\'utilisateur" name="nom_client" value="'.$nom_client.'" required autofocus><br/>
  <label for="inputBrand" class="sr-only">E-mail</label>
  <input type="email" class="form-control" placeholder="E-mail" name="email" value="'.$email.'" required><br/>
  <label for="inputBrand" class="sr-only">Mot de passe</label>
  <input type="password" class="form-control" placeholder="Mot de passe" name="password" value="'.$password.'" required><br/>
  <label for="inputBrand" class="sr-only">Prénom</label>
  <input type="text" class="form-control" placeholder="Prénom" name="prenom" value="'.$prenom.'"><br/>
  <label for="inputBrand" class="sr-only">Nom</label>
  <input type="text" class="form-control" placeholder="Nom" name="nom" value="'.$nom.'"><br/>
  <label for="inputBrand" class="sr-only">Adresse</label>
  <input type="text" class="form-control" placeholder="Adresse" name="adresse" value="'.$adresse.'"><br/>
  <label for="inputBrand" class="sr-only">Téléphone</label>
  <input type="text" class="form-control" placeholder="Téléphone" name="telephone" value="'.$telephone.'"><br/>
  <br /><br />';
  if($action == 'adduser'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Ajouter</button>';
  }
  else if($action == 'edituser'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Modifier</button>';
  }
  echo '</form>';
}
 ?>
