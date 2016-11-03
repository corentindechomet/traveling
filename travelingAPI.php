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

	default:
		# code...
	break;
}
?>