<?php

	include('./BDD/Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete1 = $dbh->prepare("SELECT * FROM restaurant WHERE (ID_R=:ID_R)");

	$requete2 = $dbh->prepare("SELECT * FROM commentaire WHERE (ID_R=:ID_R) ORDER BY Date");		// RAJOUTER AND WHRE BANNI =0


	$requete1->bindParam(':ID_R', $ID_R);
	$requete2->bindParam(':ID_R', $ID_R);
	$ID_R= $_GET['ID_R'];

	$requete1->execute();
	$requete2->execute();
	
	$restaurant=$requete1->fetchAll();


	$NomR=$restaurant[0]['NomR'];
	$Adresse=$restaurant[0]['Adresse'];
	$Ville=$restaurant[0]['Ville'];
	$CP=$restaurant[0]['CP'];
	$Tel=$restaurant[0]['Tel'];
	$Capacite=$restaurant[0]['Capacite'];
	$Description=$restaurant[0]['Description'];

	$commentaires=$requete2->fetchAll();

	

	
?>