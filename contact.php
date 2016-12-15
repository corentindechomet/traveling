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
	<div id="preloaderContainer">
		<img src="imgs/loader.gif"/>
	</div>
	<div class="overlay">
		<div id="myNavTop" class="topPart">
			<div class="container-fluid">
				<div class="row topPartContent">
				</div>
				<i class="fa fa-arrow-circle-up up carousel-control" href='#carousel-vertical' role='button' data-slide='prev' aria-hidden="true"></i>
				<i class="fa fa-arrow-circle-down down carousel-control" href='#carousel-vertical' role='button' data-slide='next' aria-hidden="true"></i>
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
			<div class="navbar navbar-fixed-top">
				<div class="navbar-header pull-left">
					<a class="navbar-brand active" href="./">TRAVELING</a>
				</div>
				<div class="navbar-header pull-right">
					<a href="oeuvres.php">Oeuvres</a>
					<a href="lieux.php">Lieux</a>
					<a class="active"  href="contact.php">Contact</a>
				</div>
			</div>
		</div>
	</nav>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>contact</h1>
				</div>
			</div>
		</div>
	</header>
	
	<section id="main">
		<div class="container">
			<div class="row contact-form">
				<h2>Des questions ? Des idées de film ou série à présenter ? Contactez-nous !</h2>
				<form>
					<div class="col-md-offset-3 col-md-6">
						<input placeholder="Nom" name="nom" value="" type="text">
					</div>
					<div class="col-md-offset-3 col-md-6">
						<input placeholder="Email" name="prenom" value="" type="text">
					</div>
					<div class="col-md-offset-3 col-md-6">
						<input placeholder="Sujet" name="sujet" value="" type="text">
					</div>
					<div class="col-md-offset-3 col-md-6">
						<textarea placeholder="Message" name="message"></textarea>
					</div>
					<div class="col-md-offset-3 col-md-2">
						<input placeholder="Sujet" name="form" value="Envoyer" type="submit">
					</div>
				</form>
			</div>
		</div>
	</section>
	<?php include 'footer.php' ?>
</body>
<?php include 'allScripts.php' ?>
</html>