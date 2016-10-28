<?php
	if(!isset($_SESSION['IDSESSION']))
	{
		header('Location:../Accueil.php');
	}
	session_start();
	try
	{

	include('./Connection_BDD/Connection_serveur.php');

	$requete = $dbh->prepare("INSERT INTO commentaire(ID_R,Pseudo,Date, Contenu) VALUES(:ID_R, :Pseudo, :Date, :Contenu)");

	$id = intval($_GET['ID_R']);
	$pseudo = htmlspecialchars($_SESSION['Pseudo']);
	$date = date("d/m/Y") . " à " . date("H:i");


	$contenu = htmlspecialchars($_POST['NewComm']);


	$requete->bindParam(":ID_R",  $id);
	$requete->bindParam(":Pseudo", $pseudo);
	$requete->bindParam(":Date", $date);
	$requete->bindParam(":Contenu", $contenu);


	$requete->execute();

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Restaurant.php?ID_R='.$id);
	exit();

?>