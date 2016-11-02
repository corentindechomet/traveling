<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Traveling</title>
	<link rel="stylesheet" href="css/normalize_v5.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="myNavTop" class="topPart">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
		<div class="topPart-content">

		</div>
	</div>
	<div id="myNavBottom" class="bottomPart">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="bottomPart-content"></div>
				</div>
			</div>
		</div>
	</div>
	
	<?php include 'menu.php' ?>

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
						<a href="#mainContent">
							<svg enable-background="new 0 0 50 50" height="50px" id="Layer_1" version="1.1" viewBox="0 0 50 50" width="50px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
								<path class="arrow" d="m48.419994,2.522112l-23.320662,20.989826l-23.320661,-20.989826l0.659196,-0.732111l22.661465,20.394678l22.661467,-20.394678l0.659195,0.732111z" stroke-width="2" stroke="#f9f9f9" fill="none" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" style="stroke-dasharray: 126, 128; stroke-dashoffset: 0;"></path>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>        
	</header>

	<section id="mainContent">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
					include('connection.php');
					$requeteP = 'SELECT * FROM oeuvres LIMIT 1';
					$resultatP = $connection->query($requeteP);
					$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);
					?>
					<div class="card overlay lastFilmAdded" target-url="<?php echo $tabP[0]->idOeuvre; ?>" style="background: url('<?php echo $tabP[0]->urlimg; ?>') top;">
						<h2><span>LAST FILM ADDED</span></br><?php echo $tabP[0]->titreOeuvre; ?><h2>			
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 col-xs-12">
						<div id="searchByFilms" class="card searchBy">
							<input type="search" placeholder="Search by series or movies" name="the_search">
							<i class="searchIcon fa fa-search" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-md-6 col-xs-12">
						<div id="searchByLocation" class="card searchBy">
							<input type="search" placeholder="Search by location" name="the_search">
							<i class="searchIcon fa fa-search" aria-hidden="true"></i>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="card urban">
							<h3>DESIRE FOR <h3 class="transparent"><span class="urbanText">URBAN</span></h3></h3>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card nature">
							<h3>DESIRE FOR <h3 class="transparent"><span class="natureText">NATURE</span></h3></h3>
						</div>
					</div>
					<div class="col-md-4">
						<div class="card escape">
							<h3>DESIRE FOR <h3 class="transparent"><span class="escapeText">ESCAPE</span></h3></h3>
						</div>
					</div>
				</div>		
				<div class="row">
					<div class="col-md-12">
						<?php
						$requeteP = 'SELECT * FROM oeuvres ORDER BY RAND()';
						$resultatP = $connection->query($requeteP);
						$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);
						?>
						<div class="card overlay randomFilm" target-url="<?php echo $tabP[0]->idOeuvre; ?>">
							<h2>RANDOM FILM OR SHOW</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
	</body>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>

	</html>