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

	
	
	$NomR=$_POST['NomR'];
	$Adresse=$_POST['Adresse'] ;
	$Specialite=$_POST['Specialite'];
	$CP=$_POST['CP'];
	$Tel=$_POST['Tel'];
	$Capacite=$_POST['Capacite'];
	$Description=$_POST['Description'];
	$Ville=$_POST['Ville'];
	

	$stmt->execute();

	$dbh->commit();

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Acceuil.php');
	exit();
	?>