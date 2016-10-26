<?php
	session_start();
	include('./Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete = $dbh->prepare("INSERT INTO favoris(ID_R,Pseudo) VALUES (:ID_R,:Pseudo)");

	$requete->bindParam(':Pseudo', $pseudo);
	$requete->bindParam(':ID_R', $ID_R);
	
	$pseudo=htmlspecialchars($_SESSION['Pseudo'], ENT_COMPAT, 'UTF-8');
	$ID_R=htmlspecialchars($_GET['ID_R'], ENT_COMPAT, 'UTF-8');
	echo $ID_R;
	
	$requete->execute();
	print_r($requete->errorInfo());
	$dbh->commit();

	header('Location:../Restaurant.php?ID_R='.$ID_R);

?>