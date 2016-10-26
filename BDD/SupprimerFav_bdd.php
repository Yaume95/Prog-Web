<?php
	session_start();
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete = $dbh->prepare("DELETE FROM favoris WHERE (ID_R=:ID_R) AND (pseudo = :pseudo)");

	$requete->bindParam(':ID_R', $ID_R);
	$requete->bindParam(':pseudo', $pseudo);

	$pseudo = $_SESSION['Pseudo'];
	$ID_R = $_GET['ID_R'];

	$requete->execute();
	print_r($requete->errorInfo());
	header('Location:../Liste_Favoris.php');


?>