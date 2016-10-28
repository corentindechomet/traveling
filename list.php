<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Traveling</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/normalize_v5.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/list.css">
</head>
<body>
	<div class="overlay">
		<div id="myNavTop" class="topPart">
			<div class="container-fluid">
				<div class="row topPartContent">

				</div>
			</div>
		</div>
		<div id="myNavBottom" class="bottomPart">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12 mapReceiver">
						<div id="map"></div>
					</div>
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
					<li id="anchor1"><a href="#mainContent">Oeuvres</a></li>
					<li id="anchor2"><a href="#projets">Lieux</a></li>
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
					<h1>oeuvres</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form method="get">
						<i class='fa fa-search' aria-hidden='true'></i><input class="search-header" name="search" title="Rechercher une oeuvre" type="text" placeholder="Rechercher une oeuvre"></input>
					</form>
				</div>
			</div>
		</div>
	</header>
	
	<section id="main">
		<div class="container">
			<div class="row">
				<?php
				include('connection.php');
				if(isset($_GET['search']))
					$requeteP = "SELECT * FROM oeuvres WHERE titreOeuvre LIKE '%".$_GET['search']."%' ";
				else
					$requeteP = 'SELECT * FROM oeuvres';
				$resultatP = $connection->query($requeteP);
				$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

				if(isset($_GET['search'])){
					echo "<h2>".count($tabP)." résulat(s) pour votre recherche : ".$_GET['search']."</h2>";
					echo "<hr />";
				}

				for($i=0;$i<count($tabP);$i++){ ?>
					<div class="col-md-4 video">
						<div class="card overlay" target-url="<?php echo $tabP[$i]->idOeuvre?>">
							<video class="thevideo" loop preload="yes">
								<source src="<?php echo $tabP[$i]->urlvideo; ?>" type="video/mp4">
								</video>
								<div class="card-text subtitle lieu"><?php echo $tabP[$i]->lieu; ?></div>
								<div class="card-text list-title"><?php echo $tabP[$i]->titreOeuvre; ?></div>
								<div class="card-text subtitle type"><?php 
									$type = $tabP[$i]->type;
									if($type == 0)
										echo 'film'; 
									else if($type == 1)
										echo 'série';

									else if($type == 2)
										echo 'documentaire';
									else
										echo 'erreur type';
									?>
								</div>
								<div class="card-text subtitle genre"><?php echo $tabP[$i]->genre; ?></div>
							</div>
						</div>								
						<?php }?>
					</div>
				</div>
			</section>
		</body>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/smoothState.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyludd9u3BMWppTxeU0NUzvxUdRGI42I0"></script>
		<script src="js/script.js"></script>
		<script>	

		</script>
		</html>