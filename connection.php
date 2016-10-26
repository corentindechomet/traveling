<?php

$config=parse_ini_file('configuration/configuration.ini');

$options=array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".$config["encodage"]);

	try
	{
		$connection = new PDO('mysql:host='.$config['hote'].';port='.$config['port'].';dbname='.$config['nom_bd'],$config['identifiant'], $config['mot_de_passe'],$options);
		
	} catch (PDOException $erreur)
	{
		echo "Ce service est momentanément indisponible.";
		
		exit();
	}

?>