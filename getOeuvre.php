<?php
include('connection.php');
$id=$_GET['id'];
$requeteP = 'SELECT * FROM oeuvres WHERE id ='.$id;

$resultatP = $connection->query($requeteP);
$tabP = $resultatP->fetchAll(PDO::FETCH_OBJ);

echo $tabP[0]->descriptionOeuvre;
?>