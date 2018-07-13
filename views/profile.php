<?php
require_once "navbar.php";

?>
<div class="single-blog-wrapper">

  <!-- Single Blog Post Thumb -->
  <div class="single-blog-post-thumb">
    <img src="img/bg-img/bg-8.jpg" alt="">
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8">
        <div class="regular-page-content-wrapper section-padding-80">
          <div class="regular-page-text">
            <h2> Profil de
              <?php
              // First Name / Last Name or login dislay
              if(isset($_SESSION['prenom']) || isset($_SESSION['nom'])){
                if(isset($_SESSION['prenom'])){
                  echo $_SESSION['prenom'].' ';
                }
                if(isset($_SESSION['nom'])){
                  echo $_SESSION['nom'].' ';
                }
              }
              elseif(isset($_SESSION['login'])){
                echo $_SESSION['login'];
              }
              ?>
            </h2>
            <?php
            echo '<p>';
            if(isset($_SESSION['login'])) {echo '<h6>Nom d\'utilisateur:</h6>'.$_SESSION['login'].'<br/><br/>'; }


            if(isset($_SESSION['prenom'])) {echo ' <h6>Prénom:</h6>'.$_SESSION['prenom'].'<br/><br/>'; }

            if(isset($_SESSION['nom'])) {echo ' <h6>Nom:</h6>'.$_SESSION['nom'].'<br/><br/>'; }

            if(isset($_SESSION['pays'])) {echo ' <h6>Pays:</h6>'.$_SESSION['pays'].'<br/><br/>'; }

            if(isset($_SESSION['adresse'])) {echo ' <h6>Adresse:</h6> '.$_SESSION['adresse'].'<br/><br/>'; }

            if(isset($_SESSION['code_postal'])) {echo ' <h6>Code Postal:</h6> '.$_SESSION['code_postal'].'<br/><br/>'; }

            if(isset($_SESSION['ville'])) {echo ' <h6>Ville:</h6> '.$_SESSION['ville'].'<br/><br/>'; }

            if(isset($_SESSION['telephone'])) {echo '<h6>Téléphone:</h6> '.$_SESSION['telephone'].'<br/><br/>'; }

            if(isset($_SESSION['email'])) {echo '<h6>Email:</h6>'.$_SESSION['email'].'<br/><br/>'; }
            echo '</p>';


            echo '<h2>Commandes</h2>
            <table class="table table-striped table-sm">
            <tr>
              <th>Id</th>
              <th>Date de la commande</th>
              <th>Nombres d\'articles</th>
              <th>Prix total</th>
              <th>Status</th>
            </tr>';
            foreach($orderList as $order){
              echo '<tr>
                <th>'.$order['id'].'</th>
                <th>'.$order['date_commande'].'</th>
                <th>'.$orders->nbArticles($order['id']).'</th>
                <th>'.$orders->totalPrice($order['id']).'€</th>
                <th>En cours de traitement</th>
              </tr>';

              $articlesList = $cart->getByOrder($order['id']);

              foreach($articlesList as $article){
                echo '<tr>
                <td></td>
                <td>'.$article['libelle'].'</td>
                <td>'.$article['quantite'].'</td>
                <td>'.$article['prix']*$article['quantite'].'€</td>
                <td></td>
                </tr>';
              }
              echo '<tr><td></td></tr>';
            }

            echo '</table>'
            ?>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
