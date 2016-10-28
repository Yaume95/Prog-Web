<?php
	session_start();
	include('./Connection_BDD/Connection_serveur.php');

	if(!isset($_SESSION['Collaborateur']) or $_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
	}

	$dbh->beginTransaction();

	$requete = $dbh->prepare("DELETE FROM restaurant WHERE (ID_R=:ID_R)");
	$requete2 = $dbh->prepare("DELETE * FROM carte WHERE (ID_R=:ID_R)");

	$requete->bindParam(':ID_R', $ID_R);
	$requete2->bindParam(':ID_R', $ID_R);

	$ID_R = $_GET['ID_R'];

	$requete->execute();
	$requete2->execute();
	header('Location:../Recherche.php?recherche=');


?>