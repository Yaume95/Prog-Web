<?php
	session_start();
	if(!isset($_SESSION['Collaborateur']) || $_SESSION['Collaborateur']==0)
	{
		header('Location:../Accueil.php');
		exit();
	}


	try
	{

		include('./Connection_BDD/Connection_serveur.php');

		$requete = $dbh->prepare("INSERT INTO carte(Nom,Entree,Plat,Dessert,Prix,ID_R) VALUES(:Nom, :Entree, :Plat, :Dessert, :Prix, :ID_R)");

		$requete->bindParam(":Nom", $Nom);
		$requete->bindParam(":Entree", $Entree);
		$requete->bindParam(":Plat", $Plat);
		$requete->bindParam(":Dessert", $Dessert);
		$requete->bindParam(":Prix", $Prix);
		$requete->bindParam(":ID_R", $ID_R);
		

		$Nom=$_POST['NomPlat'];

		switch ($_POST['Type']) 
		{
			case 'Entree':
				$Entree=1;
				$Plat=0;
				$Dessert=0;
				break;

			case 'Plat':
				$Entree=0;
				$Plat=1;
				$Dessert=0;
				break;

			case 'Dessert':
				$Entree=0;
				$Plat=0;
				$Dessert=1;
				break;
		}

		$Prix=intval($_POST['PrixPlat']);

		$ID_R=intval($_GET['ID_R']);

		$requete->execute();



	}	catch(PDOException $e)
	{
		print "Erreur ! : " . $e->getMessage();
	} 

	header('Location:../Restaurant.php?ID_R=' . $ID_R)


?>