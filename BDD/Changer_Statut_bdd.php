<?php

try
{
	$user='root';
	$pw='';
	$bdd='projet_web';
	
	$dbh= new PDO('mysql:host=127.0.0.1;dbname=' . $bdd, $user , $pw);

	$dbh->beginTransaction();

	if($_GET['ban']=="0")
	{
		$stmt = $dbh->prepare("UPDATE membre SET collaborateur=1 WHERE pseudo = :pseudo");


		$stmt->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$stmt->execute();

		$dbh->commit();

	}

	else if($_GET['ban']=="1")
	{
		$stmt = $dbh->prepare("UPDATE membre SET banni=1 WHERE pseudo = :pseudo");


		
		$stmt->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		


		$stmt->execute();

		$dbh->commit();

	}

	else if($_GET['ban']=="2")
	{
		$stmt = $dbh->prepare("UPDATE membre SET banni=0 WHERE pseudo = :pseudo");


		$stmt->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$stmt->execute();

		$dbh->commit();

	}

		else if($_GET['ban']=="3")
	{
		$stmt = $dbh->prepare("DELETE FROM membre WHERE pseudo=:pseudo");


		$stmt->bindParam(':pseudo', $pseudo);

		$pseudo=$_GET['Pseudo'];
		

		$stmt->execute();

		$dbh->commit();

	}

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	}

	
	header('Location:../Liste_Membres.php');
	exit();

	
?>