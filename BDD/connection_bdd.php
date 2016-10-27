<?php 

session_start();


try
{
	
	
	include('./Connection_BDD/Connection_serveur.php');
	$dbh->beginTransaction();

	$stmt = $dbh->prepare("SELECT pseudo,mdp,nom,prenom,email,collaborateur FROM membre WHERE (pseudo=:pseudo) AND (mdp=:mdp)	 ");

	$stmt->bindParam(':pseudo', $pseudo);
	$stmt->bindParam(':mdp',$mdp);
	
	$pseudo=htmlspecialchars( $_POST['pseudo'] );
	$mdp=sha1( htmlspecialchars($_POST['mdp']) );

	$stmt->execute();

	$donnees=$stmt->fetchAll();
	

	if(count($donnees)==0)
	{
		echo "test";
	}
	else
	{
		$_SESSION['Nom'] = $donnees[0]['nom'];
		$_SESSION['Prénom'] = $donnees[0]['prenom'];
		$_SESSION['Pseudo'] = $donnees[0]['pseudo'];
		$_SESSION['Collaborateur'] = $donnees[0]['collaborateur'];
		$_SESSION['IDSESSION'] = sha1($donnees[0]['pseudo']) . sha1($donnees[0]['email']);
		header('Location:../Accueil.php');
	}

	
	
	$dbh->commit();
	
	}catch(PDOException $e)
	{
		print "Erreur!:" . $e->getMessage() ."<br>";
	} 

	
	
?>
