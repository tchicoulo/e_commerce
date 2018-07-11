<?php
// ORDERS ADMINISTRATION VIEW

if($action == 'showorders' || $action == 'deleteorder'){
  echo '<a href="/sheekstore/e_commerce/index.php/admin/addorder/"><button class="btn btn-lg btn-primary btn-block" name="addorder">Ajouter une commande</button></a><br /><br />';

  if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

  echo '<table class="table table-striped table-sm">
  <thead>
  <tr>
  <th>Id</th>
  <th>Date commande</th>
  <th>Nom client</th>
  <th>Nombre d\'articles</th>
  <th>Prix total</th>
  <th>Statut</th>
  <th>Editer</th>
  <th>Supprimer</th>
  </tr>
  </thead>
  <tbody>
  ';

  foreach($adminList as $order){
    echo '<tr>
    <td>'.$order['id'].'</td>
    <td><a href="/sheekstore/e_commerce/index.php/admin/editorder/'.$order['id'].'">'.$order['date_commande'].'</a></td>
    <td>'.$order['nom_client'].'</td>
    <td></td>
    <td></td>
    <td></td>
    <form method="post">
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/editorder/'.$order['id'].'" src="/sheekstore/e_commerce/img/edit.png" alt="Icone d\'édition" class="icon" /></td>
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/deleteorder/'.$order['id'].'" src="/sheekstore/e_commerce/img/delete.png" alt="Icone de suppression" class="icon" /></td>
    </form>';
  }

  echo '</tbody>
  </table>';
}
else if($action =='addorder' || $action =='editorder'){
  echo '<form class="form-signin" action="/sheekstore/e_commerce/index.php/admin/showorders" method="post">
  <h1 class="h3 mb-3 font-weight-normal">'.$verb.' une commande</h1>
  <input type="hidden" name="id" value="'.$id.'">
  <label for="inputName" class="sr-only">Date de la commande</label>
  <input type="date" class="form-control" placeholder="Date de la commande" name="date_commande" value="'.$date_commande.'" required autofocus><br/>
  <label for="inputBrand" class="sr-only">Id client</label>
  <input type="text" class="form-control" placeholder="Id client" name="id_client" value="'.$id_client.'" required><br/>';


  if($action == 'addorder'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Ajouter</button>';
  }
  else if($action == 'editorder'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Modifier</button>';
  }
  echo '</form>';
}
 ?>
