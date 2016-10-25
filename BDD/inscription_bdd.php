<?php

try
{
	
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();
	

	$stmt = $dbh->prepare("INSERT INTO membre (pseudo,nom, prenom,date_naissance,email,mdp) VALUES (:pseudo,:nom,:prenom, :date_naissance, :email, :mdp)");

	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->bindParam(':nom', $nom);
	$stmt->bindParam(':prenom', $prenom);
	$stmt->bindParam(':mdp',$mdp);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':date_naissance', $date_naissance);
	

	
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'] ;
	$pseudo=$_POST['pseudo'];
	$mdp=sha1($_POST['mdp']);
	$email=$_POST['email'];
	$date_naissance=$_POST['date_naissance'];
	
	
	$stmt->execute();

	print_r($stmt->errorInfo());

	$dbh->commit();

	header('Location:../Acceuil.php');
	exit();
	
	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 


	

	 
	
	

?>