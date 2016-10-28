<?php

	session_start();

	if(!isset($_SESSION['Collaborateur']) or $_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
	}
	
	include('./Connection_BDD/Connection_serveur.php');

	if($_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
	}

	$dbh->beginTransaction();

	$requete = $dbh->prepare("DELETE FROM commentaire WHERE (ID_C=:ID_C)");

	$requete->bindParam(':ID_C', $ID_C);

	$ID_C = $_GET['ID_C'];
	$ID_R = $_GET['ID_R'];

	$requete->execute();
	header('Location:../Restaurant.php?ID_R='.$ID_R);
?>