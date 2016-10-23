<?php

try
{
	$user='root';
	$pw='';
	$bdd='projet_web';
	
	$dbh= new PDO('mysql:host=127.0.0.1;dbname=' . $bdd, $user , $pw);

	$dbh->beginTransaction();

	$stmt = $dbh->prepare("INSERT INTO restaurant (ID_R,NomR, Adresse, CP,Specialite,Tel,Capacite, Description) VALUES (:ID_R ,:NomR, :Adresse, :CP,:Specialite,:Tel,:Capacite, :Description)");

	$stmt->bindParam(':ID_R',$ID_R);
	$stmt->bindParam(':NomR', $NomR);
	$stmt->bindParam(':Adresse', $Adresse);
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
	

	$stmt->execute();

	$dbh->commit();

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Acceuil.php');
	exit();
	?>