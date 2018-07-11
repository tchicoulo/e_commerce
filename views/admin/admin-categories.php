<?php
// USERS ADMINISTRATION VIEW

if($action == 'showcategories' || $action == 'deletecategory'){
  echo '<a href="/sheekstore/e_commerce/index.php/admin/addcategory/"><button class="btn btn-lg btn-primary btn-block" name="addcategory">Ajouter une Catégorie</button></a><br /><br />';

  if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

  echo '<table class="table table-striped table-sm">
  <thead>
  <tr>
  <th>Id</th>
  <th>Nom Catégorie</th>
  <th>Editer</th>
  <th>Supprimer</th>
  </tr>
  </thead>
  <tbody>
  ';

  foreach($adminList as $category){
    echo '<tr>
    <td>'.$category['id'].'</td>
    <td><a href="/sheekstore/e_commerce/index.php/admin/editcategory/'.$category['id'].'">'.$category['nom_categorie'].'</a></td>
    <form method="post">
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/editcategory/'.$category['id'].'" src="/sheekstore/e_commerce/img/edit.png" alt="Icone d\'édition" class="icon" /></td>
    <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/deletecategory/'.$category['id'].'" src="/sheekstore/e_commerce/img/delete.png" alt="Icone de suppression" class="icon" /></td>
    </form>';
  }

  echo '</tbody>
  </table>';
}
else if($action =='addcategory' || $action =='editcategory'){
  echo '<form class="form-signin" action="/sheekstore/e_commerce/index.php/admin/showcategories" method="post">
  <h1 class="h3 mb-3 font-weight-normal">'.$verb.' une Catégorie</h1>
  <input type="hidden" name="id" value="'.$id.'">
  <label for="inputName" class="sr-only">Nom de la catégorie</label>
  <input type="text" class="form-control" placeholder="Nom de la catégorie" name="nom_categorie" value="'.$nom_categorie.'" required autofocus><br/>';

  if($action == 'addcategory'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Ajouter</button>';
  }
  else if($action == 'editcategory'){
    echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Modifier</button>';
  }
  echo '</form>';
}
 ?>
