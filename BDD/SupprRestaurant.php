<?php
	session_start();
	include('./Connection_BDD/Connection_serveur.php');

	if($_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
	}

	$dbh->beginTransaction();

	$requete = $dbh->prepare("DELETE FROM restaurant WHERE (ID_R=:ID_R)");

	$requete->bindParam(':ID_R', $ID_R);

	$ID_R = $_GET['ID_R'];

	$requete->execute();
	header('Location:../Recherche.php?recherche=');


?>