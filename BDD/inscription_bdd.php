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
	

	
	$nom=htmlspecialchars( $_POST['nom'] , ENT_COMPAT, 'UTF-8');
	$prenom=htmlspecialchars( $_POST['prenom'], ENT_COMPAT, 'UTF-8');
	$pseudo=htmlspecialchars( $_POST['pseudo'], ENT_COMPAT, 'UTF-8' );
	$mdp=sha1( htmlspecialchars( $_POST['mdp'], ENT_COMPAT, 'UTF-8' ) );
	$email=htmlspecialchars( $_POST['email'] , ENT_COMPAT, 'UTF-8');
	$date_naissance=htmlspecialchars( $_POST['date_naissance'], ENT_COMPAT, 'UTF-8' );
	
	
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