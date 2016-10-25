<?php

	$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

	$dbh->beginTransaction();

	$requete1 = $dbh->prepare("SELECT * FROM restaurant WHERE (ID_R=:ID_R)");

	$requete2 = $dbh->prepare("SELECT * FROM commentaire WHERE (ID_R=:ID_R) ORDER BY Date");


	$requete1->bindParam(':ID_R', $ID_R);
	$requete2->bindParam(':ID_R', $ID_R);
	$ID_R= $_GET['ID_R'];

	$requete1->execute();
	$requete2->execute();
	
	$restaurant=$requete1->fetchAll();


	$_GLOBALS['NomR']=$restaurant[0]['NomR'];
	$_GLOBALS['Adresse']=$restaurant[0]['Adresse'];
	$_GLOBALS['Ville']=$restaurant[0]['Ville'];
	$_GLOBALS['CP']=$restaurant[0]['CP'];
	$_GLOBALS['Tel']=$restaurant[0]['Tel'];
	$_GLOBALS['Capacite']=$restaurant[0]['Capacite'];
	$_GLOBALS['Description']=$restaurant[0]['Description'];

	$commentaires=$requete2->fetchAll();

	$_GLOBALS['commentaires']=$commentaires;

	
?>