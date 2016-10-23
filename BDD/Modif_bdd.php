<?php

try
{
	
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
	

	
	echo $nom=$_POST['nom'];
	echo $prenom=$_POST['prenom'];
	echo $pseudo=$_POST['pseudo'];
	echo $email=$_POST['email'];
	echo $datenaissance=$_POST['datenaissance'];

	echo $_SESSION['Prénom'] = $prenom;
	echo $_SESSION['Nom'] = $nom;
	
	
	$requete->execute();

	$dbh->commit();
	
	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Profil.php');
		

?>
