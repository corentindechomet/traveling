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
	<?php include 'overlay.php' ?>

	<?php include 'menu.php' ?>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>lieux</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form method="get">
						<i class='fa fa-search' aria-hidden='true'></i><input class="search-header" name="search" title="Rechercher une oeuvre" type="text" placeholder="Rechercher un lieu"></input>
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
				if(isset($_GET['searchLocation']))
					$requeteP = "SELECT * FROM lieu WHERE nomLieu LIKE '%".$_GET['searchLocation']."%' OR pays LIKE '%".$_GET['searchLocation']."%' ";
				else
					$requeteP = 'SELECT * FROM lieu';
				$resultatP = $connection->query($requeteP);
				$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

				if(isset($_GET['searchLocation'])){
					echo "<h2>".count($tabP)." résulat(s) pour votre recherche : ".$_GET['searchLocation']."</h2>";
					echo "<hr />";
				}

				for($i=0;$i<count($tabP);$i++){ ?>
					<div class="col-md-4 video">
						<div class="card shadow overlay lieu" target-url="<?php echo $tabP[$i]->idLieu?>">
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
		</body>
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/smoothState.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyludd9u3BMWppTxeU0NUzvxUdRGI42I0"></script>
		<script src="js/script.js"></script>
		<script>	

		</script>
		</html>