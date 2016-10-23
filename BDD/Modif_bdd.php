<?php

try
{
	session_start();
	
	$user='root';
	$pw='';
	$bdd='projet_web';
	
	$dbh= new PDO('mysql:host=127.0.0.1;dbname=' . $bdd, $user, $pw);
	$dbh->beginTransaction();

	$requete = $dbh->prepare("UPDATE membre SET nom=:nom, prenom=:prenom, email=:email, date_naissance=:datenaissance WHERE (pseudo=:pseudo)");

	$requete->bindParam(':pseudo', $pseudo);
	$requete->bindParam(':nom', $nom);
	$requete->bindParam(':prenom', $prenom);
	$requete->bindParam(':email', $email);
	$requete->bindParam(':datenaissance', $datenaissance);
	

	
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$pseudo=$_SESSION['Pseudo'];
	$email=$_POST['email'];
	$datenaissance=$_POST['datenaissance'];

	echo $_SESSION['Pseudo'];
	
	
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
