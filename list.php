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
					<li id="anchor1"><a href="#main">Search by film</a></li>
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
					<h1>oeuvres</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form method="post">
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
				$search = $_POST['search']
				$requeteP = 'SELECT * FROM oeuvres';
				$resultatP = $connection->query($requeteP);
				$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);
				for($i=0;$i<count($tabP);$i++){ ?>
					<div class="col-md-4 video">
						<div class="card" target-url="<?php echo $tabP[$i]->id; ?>">
						<video class="thevideo" loop preload="yes">
					      <source src="<?php echo $tabP[$i]->urlvideo; ?>" type="video/mp4">
					    </video>
					    	<div class="lieu"><?php echo $tabP[$i]->lieu; ?></div>
							<div class="title"><?php echo $tabP[$i]->titreOeuvre; ?></div>
							<div class="genre"><?php echo $tabP[$i]->genre; ?></div>
						</div>
					</div>								
					<?php }
					?>
				</div>
			</div>
		</section>

	</body>
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/smoothState.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	</html>