<!doctype html>
<html lang="fr">

<?php include 'header.php' ?>
<link rel="stylesheet" href="css/list.css">

<body>
	<div id="preloaderContainer">
		<img src="imgs/loader.gif"/>
	</div>

	<?php include 'overlay.php' ?>

	<!-- Navbar -->
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar navbar-fixed-top">
				<div class="navbar-header pull-left">
					<a class="navbar-brand active" href="./">TRAVELING</a>
				</div>
				<div class="navbar-header pull-right">
					<a href="oeuvres.php">Oeuvres</a>
					<a class="active" href="lieux.php">Lieux</a>
					<a href="contact.php">Contribuer</a>
				</div>
			</div>
		</div>
	</nav>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>lieux</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
					<form method="get">
						<i class='fa fa-search chercherLieu' aria-hidden='true'></i>
						<input class="search-header" name="searchLocation" title="Rechercher un lieu" type="text" placeholder="Rechercher un lieu"></input>
					</form>
				</div>
			</div>
		</div>
	</header>
	
	<section id="main" class="listOfCards">
		<div class="container">
			<div class="row">
				<?php
				include('connection.php');
				if(isset($_GET['searchLocation']))
					$requeteP = "SELECT * FROM lieu WHERE nomLieu LIKE '%".$_GET['searchLocation']."%' OR pays LIKE '%".$_GET['searchLocation']."%' ";
				else
					$requeteP = 'SELECT * FROM lieu';
				$resultatP = $connection->query($requeteP);
				$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

				if(isset($_GET['searchLocation'])){
					echo "<h2 class='searchtitle'>".count($tabP)." résulat(s) pour votre recherche : ".$_GET['searchLocation']."</h2>";
					echo "<hr />";
				}
<<<<<<< HEAD
				if(count($tabP)>0){
					for($i=0;$i<count($tabP);$i++){ ?>
						<div class="col-md-offset-0 col-md-4 col-sm-6 col-xs-6 video">
						<div class="card shadow overlay lieu" target-url="<?php echo $tabP[$i]->idLieu?>">
							<video class="thevideo" loop preload="yes">
								<source src="<?php echo $tabP[$i]->urlvideo ?>" type="video/mp4">
								</video>
								<div class="card-text subtitle pays"><?php echo $tabP[$i]->pays ?></div>
								<div class="card-text list-title"><?php echo $tabP[$i]->nomLieu ?></div>
								<div class="card-text subtitle genre"><?php echo $tabP[$i]->type ?></div>
							</div>
						</div>								
					<?php }
				}else{ ?>
					<div class="Nosearchresult">
						<p >Désolé ! Votre recherche n'a retourné aucun résultat si vous pensez qu'il s'agit d'un manque, n'hésitez pas à nous <a href="contact.php">contacter</a> !</p>
						<img src="imgs/abbesses.jpg" />
					</div>
				<?php }?>
=======

				for($i=0;$i<count($tabP);$i++){ ?>
				<div class="col-md-offset-0 col-md-4 col-sm-6 col-xs-6 video">
					<div class="card shadow overlay lieu" target-url="<?php echo $tabP[$i]->idLieu?>">
						<div class="videoReceiver" style="background: url(<?php echo $tabP[$i]->videoFrame; ?>) center no-repeat">
							<video class="thevideo" loop preload="yes">
								<source src="<?php echo $tabP[$i]->urlvideo ?>" type="video/mp4">
								</video>
							</div>
							<div class="card-text subtitle pays"><?php echo $tabP[$i]->pays ?></div>
							<div class="card-text list-title"><?php echo $tabP[$i]->nomLieu ?></div>
							<div class="card-text subtitle genre"><?php echo $tabP[$i]->type ?></div>
						</div>
					</div>								
					<?php }?>
>>>>>>> 2cf368e2feb94ad3085ace95085d09f2c907581c
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
	</body>
	<?php include 'allScripts.php' ?>

	</html>