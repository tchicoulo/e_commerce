<?php
if(!isset($_SESSION['admin'])){
  ?>
  <form class="form-signin" action="/sheekstore/e_commerce/index.php/signin" method="post">
    <img class="mb-4" src="/sheekstore/e_commerce/img/logo.jpg" alt="">
    <h1 class="h3 mb-3 font-weight-normal">Identifiez-vous</h1>
    <label for="inputEmail" class="sr-only">Adresse E-mail</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Adresse E-mail" name="login" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required><br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Connexion</button>
  </form>
  <?php
}
else if($_SESSION['admin'] == 'yes'){ ?>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="/sheekstore/e_commerce/index.php/home"><img src="/sheekstore/e_commerce/img/sheeks.png" alt="Sheeks Logo" /></a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Rechercher" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="/sheekstore/e_commerce/index.php/logout">Déconnexion</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="/sheekstore/e_commerce/index.php/admin">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sheekstore/e_commerce/index.php/admin/showorders">
                <span data-feather="file"></span>
                Commandes
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sheekstore/e_commerce/index.php/admin/showproducts">
                <span data-feather="shopping-cart"></span>
                Produits
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sheekstore/e_commerce/index.php/admin/showclients">
                <span data-feather="users"></span>
                Utilisateurs
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/sheekstore/e_commerce/index.php/admin/showcategories">
                <span data-feather="bar-chart-2"></span>
                Catégories
              </a>
            </li>
          </ul>

        </div>
      </nav>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        global $action;

        if(isset($action)){

          // PRODUCTS
          if($action == 'showproducts' || $action == 'deleteproduct'){
            echo '<a href="/sheekstore/e_commerce/index.php/admin/addproduct/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter un Produit</button></a><br /><br />';

            if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

            echo '<table class="table table-striped table-sm">
            <thead>
            <tr>
            <th>Id</th>
            <th>Libelle</th>
            <th>Marque</th>
            <th>Catégorie</th>
            <th>Editer</th>
            <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            ';

            foreach($adminList as $product){
              echo '<tr>
              <td>'.$product['id'].'</td>
              <td><a href="/sheekstore/e_commerce/index.php/admin/showproducts/'.$product['id'].'">'.$product['libelle'].'</a></td>
              <td>'.$product['marque'].'</td>
              <td>'.$product['nom_categorie'].'</td>
              <form method="post">
              <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/editproduct/'.$product['id'].'" src="/sheekstore/e_commerce/img/edit.png" alt="Icone d\'édition" class="icon" /></td>
              <td><input type="image" formaction="/sheekstore/e_commerce/index.php/admin/deleteproduct/'.$product['id'].'" src="/sheekstore/e_commerce/img/delete.png" alt="Icone de suppression" class="icon" /></td>
              </form>';
            }

            echo '</tbody>
            </table>';
          }
          else if($action =='addproduct' || $action =='editproduct'){
            echo '<form class="form-signin" action="/sheekstore/e_commerce/index.php/admin/showproducts" method="post">
            <h1 class="h3 mb-3 font-weight-normal">'.$verb.' un produit</h1>
            <input type="hidden" name="id" value="'.$id.'">
            <label for="inputName" class="sr-only">Nom du produit</label>
            <input type="text" class="form-control" placeholder="Nom du produit" name="libelle" value="'.$libelle.'" required autofocus><br/>
            <label for="inputBrand" class="sr-only">Marque</label>
            <input type="text" class="form-control" placeholder="Marque" name="marque" value="'.$marque.'" required><br/>
            <label for="inputCategory" class="sr-only">Catégorie</label>
            <h5>Categorie:</h5>
            <select class="form-control" name="id_Categorie">';
            foreach($categories as $category){
              if($id_categorie == $category['id']){
                echo '<option value="'.$category['id'].'" selected>'.$category['nom_categorie'].'</option>';
              }
              else{
                echo '<option value="'.$category['id'].'">'.$category['nom_categorie'].'</option>';
              }
            }
            echo '</select><br /><br />';
            if($action == 'addproduct'){
              echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Ajouter</button>';
            }
            else if($action == 'editproduct'){
              echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Modifier</button>';
            }
            echo '</form>';
          }

          // ORDERS
          if($action == 'showorders' || $action == 'deleteorder'){
            echo '<a href="/sheekstore/e_commerce/index.php/admin/addorder/"><button class="btn btn-lg btn-primary btn-block" name="addorder">Ajouter une commande</button></a><br /><br />';

            if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

            echo '<table class="table table-striped table-sm">
            <thead>
            <tr>
            <th>Id</th>
            <th>Date commande</th>
            <th>Id client</th>
            <th>Editer</th>
            <th>Supprimer</th>
            </tr>
            </thead>
            <tbody>
            ';

            foreach($adminList as $order){
              echo '<tr>
              <td>'.$order['id'].'</td>
              <td><a href="/sheekstore/e_commerce/index.php/admin/showorders/'.$order['id'].'">'.$order['date_commande'].'</a></td>
              <td>'.$order['id_client'].'</td>
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
            <input type="text" class="form-control" placeholder="Date de la commande" name="date_commande" value="'.$date_commande.'" required autofocus><br/>
            <label for="inputBrand" class="sr-only">Id client</label>
            <input type="text" class="form-control" placeholder="Id client" name="id_panie" value="'.$id_client.'" required><br/>
            <label for="inputBrand" class="sr-only">Id cart</label>
            <input type="text" class="form-control" placeholder="Id cart" name="id_cart" value="'.$id_cart.'" required><br/>';


            if($action == 'addorder'){
              echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Ajouter</button>';
            }
            else if($action == 'editorder'){
              echo '<button class="btn btn-lg btn-primary btn-block" type="submit" name="update">Modifier</button>';
            }
            echo '</form>';
          }

          // CATEGORIES
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
              <td><a href="/sheekstore/e_commerce/index.php/admin/showcategories/'.$category['id'].'">'.$category['nom_categorie'].'</a></td>
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
              <td><a href="/sheekstore/e_commerce/index.php/admin/showclients/'.$client['id'].'">'.$client['nom_client'].'</a></td>
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
        }
        else{
          ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          </div>
          <a href="/sheekstore/e_commerce/index.php/admin/addproduct/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter un Produit</button></a><br />
          <a href="/sheekstore/e_commerce/index.php/admin/addcategory/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter une Catégorie</button></a><br />
          <?php } ?>
          </main>
          </div>
          </div>
          <?php
        }
        else{
          echo '<div id="access-denied" class="form-signin">
          <p>Accès refusé, vous devez être connecté en tant qu\'administrateur pour accéder à cette page.</p>
          <p>Vous allez être redirigé dans 5 secondes...</p>
          </div>';

          sleep(5);
          header('Location: /sheekstore/e_commerce/index.php/home');
        }
        ?>
