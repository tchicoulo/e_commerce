<?php
require_once "views/navbar.php";

if(!isset($_SESSION['admin'])){
  ?>
  <form class="form-signin" action="/sheekstore/e_commerce/index.php/signin" method="post">
    <img class="mb-4" src="/sheekstore/e_commerce/img/logo.jpg" alt="">
    <h1 class="h3 mb-3 font-weight-normal">Identifiez-vous</h1>
    <label for="inputEmail" class="sr-only">Adresse E-mail</label>
    <input type="text" id="inputEmail" class="form-control" placeholder="Adresse E-mail" name="email" required autofocus>
    <label for="inputPassword" class="sr-only">Mot de passe</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" name="password" required><br/>
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="signin">Connexion</button>
  </form>
  <?php
}
else if($_SESSION['admin'] == 'yes'){ ?>

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
              <a class="nav-link" href="/sheekstore/e_commerce/index.php/admin/showusers">
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
          // ORDERS
          require_once "admin-orders.php";

          // PRODUCTS
          require_once "admin-products.php";

          // USERS
          require_once "admin-users.php";

          // CATEGORIES
          require_once "admin-categories.php";

        }
        else{
          ?>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          </div>
          <a href="/sheekstore/e_commerce/index.php/admin/addproduct/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter un Produit</button></a><br />
          <a href="/sheekstore/e_commerce/index.php/admin/addcategory/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter une Catégorie</button></a><br />
          <a href="/sheekstore/e_commerce/index.php/admin/addclient/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter un Client</button></a><br />
          <a href="/sheekstore/e_commerce/index.php/admin/addorder/"><button class="btn btn-lg btn-primary btn-block" name="addproduct">Ajouter une Commande</button></a><br />

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
