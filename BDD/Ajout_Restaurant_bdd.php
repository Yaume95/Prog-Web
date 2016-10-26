<?php

try
{
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$stmt = $dbh->prepare("INSERT INTO restaurant (NomR,Adresse,Ville,CP,Specialite,Tel,Capacite,Description) VALUES (:NomR,:Adresse,:Ville,:CP,:Specialite,:Tel,:Capacite,:Description)");
	$ajoutImage = $dbh->prepare("UPDATE restaurant SET Image=:chemin WHERE NomR=:NomR");

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

	$testErreur = ($_FILES['Image']['error'] <= 0);
	$testTaille = ($_FILES['Image']['size'] <= $_POST['MAX_FILE_SIZE']);


	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
	//1. strrchr renvoie l'extension avec le point (« . »).
	//2. substr(chaine,1) ignore le premier caractère de chaine.
	//3. strtolower met l'extension en minuscules.
	$extension_upload = strtolower(  substr(  strrchr($_FILES['Image']['name'], '.')  ,1)  );
	$testExtension =  in_array($extension_upload,$extensions_valides) ; // si l'extension est correcte;

	if($testErreur && $testTaille && $testExtension)
	{
		

		$ajoutImage->bindParam(':chemin', $chemin);
		$ajoutImage->bindParam(':NomR', $NomR);

		
 
		$nom = "../CSS/Images/Restaurant/{$NomR}.{$extension_upload}";

		echo move_uploaded_file($_FILES['Image']['tmp_name'],$nom);

		$chemin="./CSS/Images/Restaurant/{$NomR}.{$extension_upload}";

		$ajoutImage->execute();
	}


	$dbh->commit();

	}catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Acceuil.php');
	exit();
	?>