<!doctype html>
<html lang="fr">

<?php include 'header.php' ?>

<body>
	<div id="preloaderContainer">
		<img src="imgs/loader.gif"/>
	</div>
	<?php include 'overlay.php' ?>

	<div class="homeDisplay">
		<video id="video" autoplay loop>
			<source src="imgs/filmAccueil.mp4" type="video/mp4"/>
		</video>
	</div>

	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-header pull-left">
					<a class="navbar-brand active" href="./">TRAVELING</a>
				</div>
				<div class="navbar-header pull-right">
					<a href="oeuvres.php">Oeuvres</a>
					<a href="lieux.php">Lieux</a>
					<a href="contact.php">Contact</a>
				</div>
			</div>
		</div>
	</nav>

	<header id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="logo">
						<object>
							<embed src="imgs/logo.svg" type=""/>
						</object>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 col-md-offset-5">
					<div class="svgWrapper">
						<a class="arrow" href="#main">
							<svg enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<path class="arrow" d="m48.419994,2.522112l-23.320662,20.989826l-23.320661,-20.989826l0.659196,-0.732111l22.661465,20.394678l22.661467,-20.394678l0.659195,0.732111z" stroke-width="2" stroke="#f9f9f9" fill="none" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray: 126, 128; stroke-dashoffset: 0;"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>        
	</header>

	<section id="main">
		<div class="container-fluid">
			<div class="row greySection">
				<div class="container firstSection">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<h2 data-content="Dernier film ajouté" class="sectionTitle">Dernier film ajouté</h2>
						</div>
					</div>
					<div class="row">					
						<div class="col-md-12">
							<?php
							include('connection.php');
							$requeteP = 'SELECT * FROM oeuvres ORDER BY idOeuvre DESC LIMIT 1';
							$resultatP = $connection->query($requeteP);
							$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);
							?>
							<div class="card overlay oeuvre lastFilmAdded" target-url="<?php echo $tabP[0]->idOeuvre; ?>" style="background: url('<?php echo $tabP[0]->urlimg; ?>') center;">
								<h2><?php echo $tabP[0]->titreOeuvre; ?><h2>			
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row whiteSection">
					<div class="container secondSection">
						<div class="row">
							<div class="col-md-6">
								<h2 data-content="Découvrez, explorez..."  class="sectionTitle">Découvrez, explorez...</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div id="searchByFilms" class="card appear searchBy">
									<div class="center">
										<div class="row">
											<div class="col-md-1 col-sm-1 col-xs-1">
												<i class="searchIcon fa fa-search" aria-hidden="true"></i>
											</div>
											<div class="col-md-5 col-sm-5 col-xs-5">
												<form class="" action="oeuvres.php" method="get">
													<input type="search" placeholder="Rechercher une oeuvre" name="searchFilm">
												</form>	
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div id="searchByLocation" class="card appear searchBy">
									<div class="center">
										<div class="row">
											<div class="col-md-1 col-sm-1 col-xs-1">
												<i class="searchIcon fa fa-search" aria-hidden="true"></i>
											</div>
											<div class="col-md-5 col-sm-5 col-xs-5">
												<form class="" action="lieux.php" method="get">
													<input type="search" placeholder="Rechercher un lieu" name="searchLocation">
												</form>	
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row desire">
							<div class="col-md-4 col-sm-12 col-xs-12">
								<a href="urban.php">
									<div class="card appear urban">
										<h3>EXPLOREZ <h3 class="transparent"><span class="outlineText urbanText">LA VILLE</span></h3></h3>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<a href="nature.php">
									<div class="card appear nature">
										<h3>EXPLOREZ <h3 class="transparent"><span class="outlineText natureText">LA NATURE</span></h3></h3>
									</div>
								</a>
							</div>
							<div class="col-md-4 col-sm-12 col-xs-12">
								<a href="amoureux.php">
									<div class="card appear escape">
										<h3>EXPLOREZ<h3 class="transparent"><span class="outlineText escapeText">EN AMOUREUX</span></h3></h3>
									</div>
								</a>
							</div>
						</div>
					</div>	
				</div>	
				<div class="row greySection">
					<div class="container thirdSection">
						<div class="row">
							<div class="col-md-6 col-sm-12 col-xs-12">
								<h2 data-content="UN FILM AU HASARD"  class="sectionTitle">UN FILM AU HASARD</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="card overlay oeuvre randomFilm" target-type="random" target-url="<?php echo $tabP[0]->idOeuvre; ?>">
									<h2><i class="fa fa-question-circle-o" aria-hidden="true"></i></h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
	</body>
	<?php include 'allScripts.php' ?>
	<script src="js/homeScript.js"></script>
	</html>

