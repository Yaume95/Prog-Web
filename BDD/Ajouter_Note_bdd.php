<?php

	if(!isset($_SESSION['IDSESSION']) )
	{
		header('Location:../Accueil.php');
	}
	
	session_start();

	include("./Connection_BDD/Connection_serveur.php");
	
	$dbh->beginTransaction();

	$requete= $dbh->prepare("INSERT INTO notes(ID_R,Pseudo, Note) VALUES (:ID_R, :Pseudo, :Note)");

	$requete->bindParam(":ID_R", $id);
	$requete->bindParam(":Pseudo", $pseudo);
	$requete->bindParam(":Note", $note);

	$id=intval($_GET['ID_R']);
	$pseudo=$_SESSION['Pseudo'];
	$note=intval($_POST['note']);

	$requete->execute();


	print_r($requete->errorInfo());

	$dbh->commit();

	header('Location: ../Restaurant.php?ID_R='. $id);
	
?>