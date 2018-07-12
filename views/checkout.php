<?php
require_once "views/navbar.php";

if(!isset($result)){
  ?>

  <!-- ##### Breadcumb Area Start ##### -->
  <div class="breadcumb_area bg-img" style="background-image: url(/sheekstore/e_commerce/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <div class="page-title text-center">
            <h2>Validation de la commande</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ##### Breadcumb Area End ##### -->

  <!-- ##### Checkout Area Start ##### -->
  <div class="checkout_area section-padding-80">
    <div class="container">
      <div class="row">

        <div class="col-12 col-md-6">
          <div class="checkout_details_area mt-50 clearfix">

            <div class="cart-page-heading mb-30">
              <h5>Adresse de Facturation</h5>
            </div>

            <form action="/sheekstore/e_commerce/index.php/checkout" method="post">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="first_name">Prénom <span>*</span></label>
                  <input type="text" class="form-control" id="first_name" name="prenom" value="<?php if(isset($_SESSION['prenom'])){ echo $_SESSION['prenom']; } ?>" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="last_name">Nom <span>*</span></label>
                  <input type="text" class="form-control" id="last_name" name="nom" value="<?php if(isset($_SESSION['nom'])){ echo $_SESSION['nom']; } ?>" required>
                </div>
                <div class="col-12 Etas-Unismb-3">
                  <label for="country">Pays <span>*</span></label>
                  <select class="w-100" id="country" name="pays" required>
                    <option value="usa">Etats-Unis</option>
                    <option value="uk">Angleterre</option>
                    <option value="ger">Allemagne</option>
                    <option value="fra">France</option>
                    <option value="ind">Inde</option>
                    <option value="aus">Australie</option>
                    <option value="bra">Brésil</option>
                    <option value="cana">Canada</option>
                  </select>
                </div>
                <div class="col-12 mb-3">
                  <label for="street_address">Addresse <span>*</span></label>
                  <input type="text" class="form-control mb-3" id="street_address" name="adresse" value="<?php if(isset($_SESSION['adresse'])){ echo $_SESSION['adresse']; } ?>" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="postcode">Code Postal <span>*</span></label>
                  <input name="code_postal" type="number" class="form-control" id="postcode" value="" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="city">Ville <span>*</span></label>
                  <input type="text" class="form-control" id="city" name="ville" value="" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="state">Région <span>*</span></label>
                  <input type="text" class="form-control" id="state" name="region" value="" required>
                </div>
                <div class="col-12 mb-3">
                  <label for="phone_number">N° de Téléphone <span>*</span></label>
                  <input type="number" class="form-control" id="phone_number" name="telephone" min="0" value="<?php if(isset($_SESSION['telephone'])){ echo $_SESSION['telephone']; } ?>" required>
                </div>
                <div class="col-12 mb-4">
                  <label for="email_address">Adresse Email <span>*</span></label>
                  <input type="email" class="form-control" id="email_address" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>" required>
                </div>

                <div class="col-12">
                  <div class="custom-control custom-checkbox d-block mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                    <label class="custom-control-label" for="customCheck1">Utiliser la même adresse comme adresse de livraison</label>
                  </div>
                  <div class="custom-control custom-checkbox d-block mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck2">
                    <label class="custom-control-label" for="customCheck2">Créer un compte</label>
                  </div>
                </div>
              </div>

            </div>
          </div>

          <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
            <div class="order-details-confirmation">

              <div class="cart-page-heading">
                <h5>Votre Commande</h5>
                <p>Détails</p>
              </div>

              <ul class="order-details-form mb-4">
                <li><span>Produit</span> <span>Prix</span></li>
                <?php
                if(isset($_SESSION["products"]) && count($_SESSION["products"]) != 0){
                  $subtotal = 0;
                  foreach ($_SESSION["products"] as $product){
                    echo '<li><span>'.$product['product_name'].' × '.$product['quantity'].'</span><span>'.$product['product_price']*$product['quantity'].'€</span></li>';
                    $subtotal += ($product['product_price']*$product['quantity']);
                  }
                }
                if(!isset($subtotal)){
                  $subtotal = 0;
                }
                echo '<li><span>Sous-total</span> <span>'.$subtotal.'€</span></li>
                <li><span>Frais de livraison</span> <span>Gratuit</span></li>
                <li><span>Total</span> <span>'.$subtotal.'€</span></li>';
                ?>
              </ul>

              <div id="accordion" role="tablist" class="mb-4">
                <div class="card">
                  <div class="card-header" role="tab" id="headingOne">
                    <h6 class="mb-0">
                      <a data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-circle-o mr-3"></i>Paypal</a>
                    </h6>
                  </div>

                  <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pharetra tempor so dales. Phasellus sagittis auctor gravida. Integ er bibendum sodales arcu id te mpus. Ut consectetur lacus.</p>
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" role="tab" id="headingThree">
                    <h6 class="mb-0">
                      <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-circle-o mr-3"></i>Carte de crédit</a>
                    </h6>
                  </div>
                  <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion">
                    <div class="card-body">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse quo sint repudiandae suscipit ab soluta delectus voluptate, vero vitae</p>
                    </div>
                  </div>
                </div>
              </div>
              <?php echo $_SESSION['id_client']; ?>
               <input type="hidden" name="login" value="<?php if(isset($_SESSION['login'])){ echo $_SESSION['login']; } ?>">
              <input type="hidden" name="id_client" value="<?php if(isset($_SESSION['id_client'])){ echo $_SESSION['id_client']; } ?>">
              <input type="submit" class="btn essence-btn" value="Passer la commande" name="order">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
} 
else{
  echo '<h3>Votre commande a été validée</h3>';
}
?>
<!-- ##### Checkout Area End ##### -->

<!-- ##### Footer ##### -->
<?php
require_once "views/footer.php"
?>
