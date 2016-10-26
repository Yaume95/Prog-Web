<?php

try
{
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$stmt = $dbh->prepare("INSERT INTO restaurant (NomR,Adresse,Ville,CP,Specialite,Tel,Capacite,Description) VALUES (:NomR,:Adresse,:Ville,:CP,:Specialite,:Tel,:Capacite,:Description)");


	$stmt->bindParam(':NomR', $NomR);
	$stmt->bindParam(':Adresse', $Adresse);
	$stmt->bindParam(':Ville', $Ville);
	$stmt->bindParam(':CP',$CP);
	$stmt->bindParam(':Specialite', $Specialite);
	$stmt->bindParam(':Tel', $Tel);
	$stmt->bindParam(':Capacite', $Capacite);
	$stmt->bindParam(':Description', $Description);

	
	
	$NomR=htmlspecialchars($_POST['NomR'], ENT_COMPAT, 'UTF-8');
	$Adresse=htmlspecialchars($_POST['Adresse'], ENT_COMPAT, 'UTF-8');
	$Specialite=htmlspecialchars($_POST['Specialite'], ENT_COMPAT, 'UTF-8');
	$CP=htmlspecialchars($_POST['CP'], ENT_COMPAT, 'UTF-8');
	$Tel=htmlspecialchars($_POST['Tel'], ENT_COMPAT, 'UTF-8');
	$Capacite=htmlspecialchars($_POST['Capacite'], ENT_COMPAT, 'UTF-8');
	$Description=htmlspecialchars($_POST['Description'], ENT_COMPAT, 'UTF-8');
	$Ville=htmlspecialchars($_POST['Ville'], ENT_COMPAT, 'UTF-8');
	

	$stmt->execute();

	$dbh->commit();

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	//header('Location:../Acceuil.php');
	exit();
	?>