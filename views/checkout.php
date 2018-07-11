<?php
require_once "views/navbar.php";

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
                <input type="text" class="form-control" id="first_name" value="<?php if(isset($_SESSION['prenom'])){ echo $_SESSION['prenom']; } ?>" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="last_name">Nom <span>*</span></label>
                <input type="text" class="form-control" id="last_name" value="<?php if(isset($_SESSION['nom'])){ echo $_SESSION['nom']; } ?>" required>
              </div>
              <div class="col-12 Etas-Unismb-3">
                <label for="country">Pays <span>*</span></label>
                <select class="w-100" id="country" required>
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
                <input type="text" class="form-control mb-3" id="street_address" value="<?php if(isset($_SESSION['adresse'])){ echo $_SESSION['adresse']; } ?>" required>
              </div>
              <div class="col-12 mb-3">
                <label for="postcode">Code Postal <span>*</span></label>
                <input type="number" class="form-control" id="postcode" value="" required>
              </div>
              <div class="col-12 mb-3">
                <label for="city">Ville <span>*</span></label>
                <input type="text" class="form-control" id="city" value="" required>
              </div>
              <div class="col-12 mb-3">
                <label for="state">Région <span>*</span></label>
                <input type="text" class="form-control" id="state" value="" required>
              </div>
              <div class="col-12 mb-3">
                <label for="phone_number">N° de Téléphone <span>*</span></label>
                <input type="number" class="form-control" id="phone_number" min="0" value="<?php if(isset($_SESSION['telephone'])){ echo $_SESSION['telephone']; } ?>" required>
              </div>
              <div class="col-12 mb-4">
                <label for="email_address">Adresse Email <span>*</span></label>
                <input type="email" class="form-control" id="email_address" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; } ?>" required>
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

            <input type="submit" class="btn essence-btn" value="Passer la commande">
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Checkout Area End ##### -->

<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix">
  <div class="container">
    <div class="row">
      <!-- Single Widget Area -->
      <div class="col-12 col-md-6">
        <div class="single_widget_area d-flex mb-30">
          <!-- Logo -->
          <div class="footer-logo mr-50">
            <a href="#"><img src="img/core-img/logo2.png" alt=""></a>
          </div>
          <!-- Footer Menu -->
          <div class="footer_menu">
            <ul>
              <li><a href="shop.html">Shop</a></li>
              <li><a href="blog.html">Blog</a></li>
              <li><a href="contact.html">Contact</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- Single Widget Area -->
      <div class="col-12 col-md-6">
        <div class="single_widget_area mb-30">
          <ul class="footer_widget_menu">
            <li><a href="#">Order Status</a></li>
            <li><a href="#">Payment Options</a></li>
            <li><a href="#">Shipping and Delivery</a></li>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms of Use</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="row align-items-end">
      <!-- Single Widget Area -->
      <div class="col-12 col-md-6">
        <div class="single_widget_area">
          <div class="footer_heading mb-30">
            <h6>Subscribe</h6>
          </div>
          <div class="subscribtion_form">
            <form action="#" method="post">
              <input type="email" name="mail" class="mail" placeholder="Your email here">
              <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
            </form>
          </div>
        </div>
      </div>
      <!-- Single Widget Area -->
      <div class="col-12 col-md-6">
        <div class="single_widget_area">
          <div class="footer_social_area">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>
    </div>

  </div>


</footer>
<!-- ##### Footer Area End ##### -->
