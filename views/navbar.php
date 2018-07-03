
<<<<<<< HEAD
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="img/core-img/logo.png" alt=""></a>
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
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="img/bg-img/bg-6.jpg" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="single-product-details.html">Product Details</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="single-blog.html">Single Blog</a></li>
                                    <li><a href="regular-page.html">Regular Page</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area hidden">
                    <a href="#"><img src="img/core-img/heart.svg" alt=""></a>
                </div>
                <!-- User Login Info -->
                <div class="user-login-info hidden">
                    <a href="#"><img src="img/core-img/user.svg" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area hidden">
                    <a href="#" id="essenceCartBtn"><img src="img/core-img/bag.svg" alt=""> <span>3</span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->
=======

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/sheekstore/e_commerce/index.php/home"><img src="img/LOGO.jpg" width="30" height="30" class="d-inline-block align-top" alt="">Welcome To The Sheeks Store</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#">Portail<span class="sr-only">(current)</span></a>
					</li>
					<li class="nav-item active">
						<?php

						// ONGLET TOP MENU S'INSCRIRE / NOM DU LOGIN

						if (empty($_SESSION)) {
							echo '<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter">S\'identifier</a>';
						}

						else{
							echo '<a class="nav-link" href="./forum/voirprofil.php?m=0&action=consulter">Hello '.$_SESSION['login'].' !</a>';
						}

						?>

					</li>

					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Formulaire de connexion</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">

									<div class="form-group">
										<form id="userconnection" action="/sheekstore/e_commerce/index.php/signin" method="post">



											<div>Login :</div><input type="text" name="login"><br>

											<div>Password :</div><input type="password" name="password"><br>

											<br><input type="submit" name="signin" value="Se connecter">



										</form>

									</div>

								</div>
							</div>
						</div>
					</div>

					<li class="nav-item active">
						<?php
						if (empty($_SESSION)) {
							echo '
							<a class="nav-link" href="#" data-toggle="modal" data-target="#exampleModalCenter2">S\'inscrire</a>';

						}else{

							echo '<a class="nav-link" href="/sheekstore/e_commerce/index.php/logout">Deconnexion</a>';

						}

						?>
					</li>

					<li>
							<?php
								if(isset($result)){ echo $result; } // Affichage du message de confirmation / erreur

								if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'yes'){
									echo '<a class="nav-link" href="/sheekstore/e_commerce/index.php/admin">Administration</a>';
								}
							?>
					</li>

					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Formulaire d'inscription</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form  class="form-group" id="newuser" action="/sheekstore/e_commerce/index.php/signup" method="post" enctype="multipart/form-data">



										<div>Login   :</div><input type="text" name="login"><br/>

										<div>Email   :</div><input type="text" name="email"><br/>

										<div>Password:</div><input type="password" name="password"><br/>

										<div>Retapez votre Password:</div><input type="password" name="confirm"><br/>


										<br><input type="submit" name="signup" value="Valider">

									</form>

								</div>
							</div>
						</div>
					</div>



				</ul>
			</div>
		</nav>
		<div class="header-img">
			<img src="/sheekstore/e_commerce/img/header-img.jpg">

		</div>

		<nav class="navbar navbar-expand-lg navbar-light bg-light" id="deuxième-navbar">

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
					</li>
					<li class="nav-item active">

						<?php
						if (empty($_SESSION)) {
							echo '
							<a class="nav-link" href="#"><i class="fas fa-columns"></i> Forum</a>';

						}else{

							echo '<a class="nav-link" href="./forum/index.php"><i class="fas fa-columns"></i> Forum</a>';

						}

						?>






					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#"><i class="far fa-newspaper"></i> Actualités</a>

					</li>
					<li class="nav-item active">
						<a class="nav-link" href="#"><i class="fas fa-book"></i> Store</a>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<input class="form-control mr-sm-2" type="search" placeholder="Recherche" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Recherche</button>
				</form>
			</div>
		</nav>
>>>>>>> 9a53d03a001fc063ef8f789c9b8ea00beb42042c
