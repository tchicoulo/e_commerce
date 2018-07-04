


   <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
              <a class="nav-brand" href="/sheekstore/e_commerce/"><img src="/sheekstore/e_commerce/img/sheeks.png" alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="#">Shop</a>
                                <div class="dropdown">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Accessories</li>
                                        <li><a href="shop.html">Mouses</a></li>
                                        <li><a href="shop.html">Pads</a></li>
                                        <li><a href="shop.html">PlayCards</a></li>
                                        <li><a href="shop.html">Mugs</a></li>
                                        <li><a href="shop.html">Bracelets</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="/sheekstore/e_commerce/img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="blog.html">News</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">

              <?php if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur ?>

                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>

                <!-- User Login Info -->
                <?php
                if($_SESSION && $_SESSION['admin'] == 'yes'){
                    echo '<div class="user-login-info admin">
                        <a href="/sheekstore/e_commerce/index.php/admin">Administration</a>
                      </div>';
                }
                ?>

                <!-- User Login Info -->
                <div class="user-login-info sign">
                  <?php
                  if($_SESSION){
                      echo '<a href="#">'.$_SESSION['login'].'</a>';

                  }
                  else {
                    echo '<a href="#" data-toggle="modal" data-target="#signup">SignUp</a>';
                  }
                  ?>

                                    <!-- Modal SignUp Form -->

<div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="signup" aria-hidden="true" data-backdrop="false">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

                <div class="form-group">
                    <form id="newuser" action="/sheekstore/e_commerce/index.php/signup" method="post">


                                        <div>Login   :</div><input type="text" name="login"><br/>

                                        <div>Email   :</div><input type="email" name="email" required><br/>

                                        <div>Password:</div><input type="password" name="password" required><br/>

                                        <div>Confirm Password:</div><input type="password" name="confirm"><br/>


                                        <br><input type="submit" name="signup" value="Valider">
                    </form>
                </div>
            </div>
        </div>
     </div>
    </div>

                            <!-- Modal SignUp Form End -->

                </div>
                <!-- User Login Info -->
                <div class="user-login-info sign">
                    <?php
                    if($_SESSION){
                        echo '<a href="/sheekstore/e_commerce/index.php/logout">Déconnexion</a>';

                    }
                    else {
                      echo '<a href="#" data-toggle="modal" data-target="#signin">SignIn</a>';
                    }
                    ?>

                                    <!-- Modal SignIn Form-->

<div class="modal fade" id="signin" tabindex="-1" role="dialog" aria-labelledby="signin" aria-hidden="true" data-backdrop="false">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Sign In </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
            <div class="modal-body">

                <div class="form-group">
                    <form id="userconnection" action="/sheekstore/e_commerce/index.php/signin" method="post">
                        <div>Email  :</div><input type="email" name="email" required><br>
                        <div>Password:</div><input type="password" name="password" required><br>
                        <br><input type="submit" name="signin" value="Se connecter">
                    </form>
                </div>
            </div>
        </div>
     </div>
    </div>

                            <!-- Modal SignIn Form End -->

                </div>
                <!-- Favourite Area -->
                <div class="favourite-area connected hidden">
                    <a href="#"><img src="/sheekstore/e_commerce/img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info connected hidden">
                    <a href="#"><img src="/sheekstore/e_commerce/img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area connected hidden">
                    <a href="#" id="essenceCartBtn"><img src="/sheekstore/e_commerce/img/core-img/bag.svg" alt=""> <span>3</span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="/sheekstore/e_commerce/img/core-img/bag.svg" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="/sheekstore/e_commerce/img/product-img/product-1.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="/sheekstore/e_commerce/img/product-img/product-2.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="/sheekstore/e_commerce/img/product-img/product-3.jpg" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                          <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Right Side Cart End ##### -->
