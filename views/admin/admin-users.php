<?php
// USERS ADMINISTRATION VIEW

if($action == 'showclients' || $action == 'deleteclient'){
  echo '<a href="/sheekstore/e_commerce/index.php/admin/addclient/"><button class="btn btn-lg btn-primary btn-block" name="addclient">Ajouter un client</button></a><br /><br />';

  if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

  echo '<table class="table table-striped table-sm">
  <thead>
  <tr>
  <th>Id</th>
  <th>Nom client</th>
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
    <td><a href="/sheekstore/e_commerce/index.php/admin/editclient/'.$client['id'].'">'.$client['nom_client'].'</a></td>
    <td>'.$client['prenom'].'</td>
    <td>'.$client['nom'].'</td>
    <td>'.$client['email'].'</td>
    <td>'.$client['admin'].'</td>
    <form method="post">
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/editclient/'.$client['id'].'" src="/sheekstore/e_commerce/img/edit.png" alt="Icone d\'édition" class="icon" /></td>
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/deleteclient/'.$client['id'].'" src="/sheekstore/e_commerce/img/delete.png" alt="Icone de suppression" class="icon" /></td>
    </form>';
  }

  echo '</tbody>
  </table>';
}
 ?>
