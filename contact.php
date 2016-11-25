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
	
	<?php include 'menu.php' ?>

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
				<div class="col-md-offset-3 col-md-6">
					<input placeholder="Sujet" name="search" value="Envoyer" type="submit">
				</div>
			</form>
			</div>
		</div>
	</section>
	<section id="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<img src="imgs/logoWhite.png" alt="" style="width:100px">
				</div>
				<div class="col-md-4 col-md-offset-4">
					<p>MADE BY STUDENTS WITH CREATIVE IDEAS</p>
				</div>
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