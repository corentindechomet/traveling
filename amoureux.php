<!doctype html>
<html lang="fr">

<?php include 'header.php' ?>
<link rel="stylesheet" href="css/list.css">

<body>
	<div id="preloaderContainer">
		<img src="imgs/loader.gif"/>
	</div>

	<?php include 'overlay.php' ?>
	<?php include 'menu.php' ?>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h1>en amoureux</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<form method="get">
						<i class='fa fa-search' aria-hidden='true'></i><input class="search-header" name="search" title="Rechercher une oeuvre" type="text" placeholder="Rechercher un lieu"></input>
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
				if(isset($_GET['search']))
					$requeteP = "SELECT * FROM lieu WHERE categorie LIKE 'amoureux' AND nomLieu LIKE '%".$_GET['search']."%' ";
				else
					$requeteP = 'SELECT * FROM lieu WHERE categorie LIKE "amoureux"';
				$resultatP = $connection->query($requeteP);
				$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

				if(isset($_GET['search'])){
					echo "<h2 class='searchtitle'>".count($tabP)." résulat(s) pour votre recherche : ".$_GET['search']."</h2>";
					echo "<hr />";
				}

				for($i=0;$i<count($tabP);$i++){ ?>
				<div class="col-md-offset-0 col-md-4 col-sm-6 col-xs-6 video">
					<div class="card overlay lieu" target-url="<?php echo $tabP[$i]->idLieu?>">
						<video class="thevideo" loop preload="yes">
							<source src="<?php echo $tabP[$i]->urlvideo ?>" type="video/mp4">
							</video>
							<div class="card-text subtitle pays"><?php echo $tabP[$i]->pays ?></div>
							<div class="card-text list-title"><?php echo $tabP[$i]->nomLieu ?></div>
							<div class="card-text subtitle genre"><?php echo $tabP[$i]->type ?></div>
						</div>
					</div>								
					<?php }?>
				</div>
			</div>
		</section>
		<?php include 'footer.php' ?>
	</body>
	<?php include 'allScripts.php' ?>
	</html>