<?php

	$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

	$dbh->beginTransaction();

	$requete = $dbh->prepare("SELECT * FROM restaurant WHERE (ID_R=:ID_R)");

	$requete->bindParam(':ID_R', $ID_R);
	$ID_R= $_GET['ID_R'];

	$requete->execute();

	
	$restaurant=$requete->fetchAll();

	$_GLOBALS['NomR']=$restaurant[0]['NomR'];
	$_GLOBALS['Adresse']=$restaurant[0]['Adresse'];
	$_GLOBALS['Ville']=$restaurant[0]['Ville'];
	$_GLOBALS['CP']=$restaurant[0]['CP'];
	$_GLOBALS['Tel']=$restaurant[0]['Tel'];
	$_GLOBALS['Capacite']=$restaurant[0]['Capacite'];
	$_GLOBALS['Description']=$restaurant[0]['Description'];
?>