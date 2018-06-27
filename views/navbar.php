
<?php

SESSION_START();

?>


<!DOCTYPE html>
<html>
<head>
	<title>Welcome To The Sheeks Store</title>
	<meta charset="utf-8">


	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>


	<div class="container">


		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#"><img src="img/LOGO.jpg" width="30" height="30" class="d-inline-block align-top" alt="">Welcome To The Sheeks Store</a>
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
							echo '<a class="nav-link" href="./forum/voirprofil.php?m='.$_SESSION['id'].'&action=consulter">Hello '.$_SESSION['pseudo'].' !</a>';
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
										<form id="userconnection" action="./connexion.php" method="post">



											<div>Login :</div><input type="text" name="pseudo"><br>

											<div>Password :</div><input type="password" name="password"><br>

											<br><input type="submit" name="submit" value="Se connecter">



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

							echo '<a class="nav-link" href="./deconnexion.php">Deconnexion</a>';

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
									<form  class="form-group" id="newuser" action="./forum/register.php" method="post" enctype="multipart/form-data">



										<div>Pseudo   :</div><input type="text" name="pseudo"><br/>

										<div>Email   :</div><input type="text" name="email"><br/>

										<div>Password:</div><input type="password" name="password"><br/>

										<div>Retapez votre Password:</div><input type="password" name="confirm"><br/>

										<div>Signature :</div><input type="text" name="signature"><br/>







										<br><input type="submit" name="submit" value="Valider">

									</form>

								</div>
							</div>
						</div>
					</div>



				</ul>
			</div>
		</nav>

		<div class="fille">
			<img src="/e_commerce/img/back9.jpg">

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





		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
	</body>
	</html>
