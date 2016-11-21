<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Traveling</title>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/normalize_v5.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/list.css">
</head>
<body>
<svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
<defs>
<symbol id="icon-tv" viewBox="0 0 32 32">
<title>tv</title>
<path class="path1" d="M30.662 9.003c-2.775-0.399-5.731-0.688-8.815-0.851l5.153-5.153-2-2-7.017 7.017c-0.656-0.011-1.317-0.017-1.983-0.017v0l-8-8-2 2 6.069 6.069c-3.779 0.133-7.386 0.454-10.731 0.935-0.86 3.366-1.338 7.086-1.338 10.997s0.477 7.63 1.338 10.997c4.489 0.645 9.448 1.003 14.662 1.003s10.173-0.358 14.662-1.003c0.86-3.366 1.338-7.086 1.338-10.997s-0.477-7.63-1.338-10.997zM26.997 27.331c-3.367 0.43-7.086 0.669-10.997 0.669s-7.63-0.239-10.997-0.669c-0.645-2.244-1.003-4.724-1.003-7.331s0.358-5.087 1.003-7.331c3.366-0.43 7.086-0.669 10.997-0.669s7.63 0.239 10.996 0.669c0.645 2.244 1.004 4.724 1.004 7.331s-0.358 5.087-1.003 7.331z"></path>
</symbol>
</defs>
</svg>
	<?php include 'overlay.php' ?>
	
	<?php include 'menu.php' ?>

	<header class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h1>oeuvres</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
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
						<div class="card overlay oeuvre" target-url="<?php echo $tabP[$i]->idOeuvre?>">
							<video class="thevideo" loop preload="yes">
								<source src="<?php echo $tabP[$i]->urlvideo; ?>" type="video/mp4">
								</video>
								<div class="card-text subtitle lieu"><?php echo $tabP[$i]->lieu; ?></div>
								<div class="card-text list-title"><?php echo $tabP[$i]->titreOeuvre; ?></div>
								<div class="card-text subtitle genre"><?php 
									$type = $tabP[$i]->type;
									if($type == 0)
										echo '<i class="fa fa-film" aria-hidden="true"></i>';
										//echo 'film'; 
									else if($type == 1)
										echo '<i class="glyph-icon flaticon-technology"></i>';
										//echo 'série';

									else if($type == 2)
										echo 'documentaire';
									else
										echo 'erreur type';

									echo $tabP[$i]->genre;
									?>
								</div>
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