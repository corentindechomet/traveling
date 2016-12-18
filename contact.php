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
					<a class="active"  href="contact.php">Contribuer</a>
				</div>
			</div>
		</div>
	</nav>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1>contribuer</h1>
				</div>
			</div>
		</div>
	</header>
	
	<section id="main" class="contact">
		<div class="contribExplanation">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h2>Des idées de film ou série à présenter ? </h2>
						<h2 class="subtitle">Nos équipes s'occuperont d'ajouter le contenu sur Traveling !</h2>	
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row contact-form">
				<form>
					<div class="col-md-offset-3 col-md-3">
						<input placeholder="Nom" name="nom" value="" type="text">
					</div>
					<div class="col-md-3">
						<input placeholder="Prenom" name="prenom" value="" type="text">
					</div>
					<div class="col-md-offset-3 col-md-6">
						<input placeholder="Email" name="Email" value="" type="text">
					</div>

					<div class="col-md-6 col-md-offset-3">
						<select name="select1">
							<option value="value1" selected>Type de proposition</option> 
							<option value="film">film</option> 
							<option value="serie">série</option>
							<option value="lieu">lieu</option>
						</select>
					</div>

					<div class="col-md-6 col-md-offset-3">
						<div class="selectReceiver" style="display: none">
							<select name="select">
								<option value="value1">Action</option> 
								<option value="value2">Drame</option>
								<option value="value3">Policier</option>
								<option value="value4">Fantastique</option>
								<option value="value5">Documentaire</option>
								<option value="value6">Comédie</option>
								<option value="value7">Road trip</option>
							</select>
						</div>
					</div>
					<div class="scene1">
						<div class="col-md-6 col-md-offset-3 sceneName">
							Scène 1
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input placeholder="Titre de la scène" name="sceneTitle" value="" type="text">
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input type="file" name="fichier"/>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<textarea placeholder="Description" name="Description"></textarea>
						</div>						
					</div>
					<div class="scene2">	
						<div class="col-md-6 col-md-offset-3 sceneName">
						Scène 2
						</div>					
						<div class="col-md-6 col-md-offset-3">
							<input placeholder="Titre de la scène" name="sceneTitle" value="" type="text">
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input type="file" name="fichier"/>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<textarea placeholder="Description" name="Description"></textarea>
						</div>		
					</div>
					<div class="scene3">
						<div class="col-md-6 col-md-offset-3 sceneName">
							Scène 3
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input placeholder="Titre de la scène" name="sceneTitle" value="" type="text">
						</div>
						<div class="col-md-6 col-md-offset-3">
							<input type="file" name="fichier"/>
						</div>
						<div class="col-md-6 col-md-offset-3">
							<textarea placeholder="Description" name="Description"></textarea>
						</div>		
					</div>
					<div class="col-md-6 col-md-offset-3">
						<div class="deleteScene">
							-
						</div>
						<div class="addScene">
							+
						</div>
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