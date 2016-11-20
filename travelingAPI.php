<?php
include('connection.php');
$call=$_GET['call'];
switch ($call) {
	case 'oeuvre':

	$id=$_GET['id'];
	$requeteP = 'SELECT * FROM oeuvres, scene WHERE oeuvres.idOeuvre ='.$id.' AND scene.idOeuvre ='.$id ;

	$resultatP = $connection->query($requeteP);
	$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($tabP);

	break;

	case 'lieu':

	$id=$_GET['id'];
	$requeteP = 'SELECT * FROM lieu, scene WHERE lieu.idLieu ='.$id.' AND scene.idLieu ='.$id ;

	$resultatP = $connection->query($requeteP);
	$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($tabP);

	break;

	case 'randomOeuvre':

	$requeteP = 'SELECT * FROM oeuvres ORDER BY RAND()' ;

	$resultatP = $connection->query($requeteP);
	$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

	echo json_encode($tabP);

	default:
		# code...
	break;
}
?>