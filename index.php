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
	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#home">TRAVELING</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav navbar-right">
					<li id="anchor1"><a href="#mainContent">Search by film</a></li>
					<li id="anchor2"><a href="#projets">Projets</a></li>
					<li id="anchor3"><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- FIN Navbar -->

	<header id="home">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<img src="imgs/logoWhite.png" alt="logoTraveling" width="100%">
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
					<div class="card overlay lastFilmAdded" style="background: url('<?php echo $tabP[0]->urlimg; ?>') top;">
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
						<h3>DESIRED FOR <h3 class="transparent"><span class="urbanText">URBAN</span></h3></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card nature">
						<h3>DESIRED FOR <h3 class="transparent"><span class="natureText">NATURE</span></h3></h3>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card escape">
						<h3>DESIRED FOR <h3 class="transparent"><span class="escapeText">ESCAPE</span></h3></h3>
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