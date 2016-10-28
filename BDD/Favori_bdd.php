<?php
	session_start();
	include('./Connection_BDD/Connection_serveur.php');
	if(!isset($_SESSION['IDSESSION']))
	{
		header('Location:Acceuil.php');
	}

	$dbh->beginTransaction();

	if(!isset($_GET['sup']))
	{

	$requete = $dbh->prepare("INSERT INTO favoris(ID_R,Pseudo) VALUES (:ID_R,:Pseudo)");

	$requete->bindParam(':Pseudo', $pseudo);
	$requete->bindParam(':ID_R', $ID_R);
	
	$pseudo=htmlspecialchars($_SESSION['Pseudo'], ENT_COMPAT, 'UTF-8');
	$ID_R=htmlspecialchars(intval($_GET['ID_R']), ENT_COMPAT, 'UTF-8');
	echo $ID_R;
	
	$requete->execute();
	$dbh->commit();

	header('Location:../Restaurant.php?ID_R='.$ID_R);
	
	}
	else
	{

	$requete = $dbh->prepare("DELETE FROM favoris where pseudo = :pseudo and ID_R = :ID_R");

	$requete->bindParam(':pseudo', $pseudo);
	$requete->bindParam(':ID_R', $ID_R);
	
	$pseudo=htmlspecialchars($_SESSION['Pseudo'], ENT_COMPAT, 'UTF-8');
	$ID_R=htmlspecialchars(intval($_GET['ID_R']), ENT_COMPAT, 'UTF-8');
	
	$requete->execute();
	$dbh->commit();

	header('Location:../Restaurant.php?ID_R='. intval($_GET['ID_R']) );
	}

?>