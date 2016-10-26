<?php

try
{
	session_start();
	
	include('./Connection_BDD/Connection_serveur.php');
	$dbh->beginTransaction();

	$requete = $dbh->prepare("UPDATE membre SET nom=:nom, prenom=:prenom, email=:email, date_naissance=:datenaissance WHERE (pseudo=:pseudo)");

	$requete->bindParam(':pseudo', $pseudo);
	$requete->bindParam(':nom', $nom);
	$requete->bindParam(':prenom', $prenom);
	$requete->bindParam(':email', $email);
	$requete->bindParam(':datenaissance', $datenaissance);
	

	
	$nom=htmlspecialchars($_POST['nom'], ENT_COMPAT, 'UTF-8');
	$prenom=htmlspecialchars($_POST['prenom'], ENT_COMPAT, 'UTF-8');
	$pseudo=htmlspecialchars($_SESSION['Pseudo'], ENT_COMPAT, 'UTF-8');
	$email=htmlspecialchars($_POST['email'], ENT_COMPAT, 'UTF-8');
	$datenaissance=htmlspecialchars($_POST['datenaissance'], ENT_COMPAT, 'UTF-8');

	
	
	
	$requete->execute();

	$dbh->commit();
	$_SESSION['Prénom'] = $prenom;
	$_SESSION['Nom'] = $nom;

	
	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Profil.php');
	exit();
		

?>
