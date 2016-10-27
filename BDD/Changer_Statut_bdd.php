<?php

	if($_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
	}

try
{
	
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	if($_GET['ban']=="0")
	{
		$requete = $dbh->prepare("UPDATE membre SET collaborateur=1 WHERE pseudo = :pseudo");


		$requete->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$requete->execute();

		$dbh->commit();

	}

	else if($_GET['ban']=="1")
	{
		$requete = $dbh->prepare("UPDATE membre SET banni=1 WHERE pseudo = :pseudo");

		
		$requete->bindParam(':pseudo', $pseudo);	
		$pseudo=$_GET['Pseudo'];
		

		$requete->execute();

		$dbh->commit();

	}

	else if($_GET['ban']=="2")
	{
		$requete = $dbh->prepare("UPDATE membre SET banni=0 WHERE pseudo = :pseudo");


		$requete->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$requete->execute();

		$dbh->commit();

	}

	else if($_GET['ban']=="3")
	{
		$requete = $dbh->prepare("DELETE FROM membre WHERE pseudo=:pseudo");
		$requete2 = $dbh->prepare("DELETE FROM favoris WHERE pseudo=:pseudo");
		$requete3 = $dbh->prepare("DELETE FROM commentaire WHERE Pseudo=:pseudo");
		$requete4 = $dbh->prepare("DELETE FROM notes WHERE Pseudo=:pseudo");


		$requete->bindParam(':pseudo', $pseudo);
		$requete2->bindParam(':pseudo', $pseudo);
		$requete3->bindParam(':pseudo', $pseudo);
		$requete4->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$requete->execute();
		$requete2->execute();
		$requete3->execute();
		$requete4->execute();

		$dbh->commit();

	}

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	}

	
	header('Location:../Liste_Membres.php');
	exit();

	
?>