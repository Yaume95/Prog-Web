<?php

	include('./BDD/Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete1 = $dbh->prepare("SELECT * FROM restaurant WHERE (ID_R=:ID_R)");

	$requete = $dbh->prepare("SELECT * FROM commentaire NATURAL JOIN membre WHERE (ID_R=:ID_R) and banni=0 ORDER BY Date");


	$requete1->bindParam(':ID_R', $ID_R);
	$requete->bindParam(':ID_R', $ID_R);
	$ID_R= $_GET['ID_R'];

	$requete1->execute();
	$requete->execute();
	
	$restaurant=$requete1->fetchAll();

	$requete2 = $dbh->prepare("SELECT COUNT(*) AS nb,round(avg(Note),1) AS noteM FROM notes WHERE Note>=0 and ID_R=:ID_R");
					$requete3 = $dbh->prepare("SELECT * FROM notes WHERE Pseudo=:Pseudo and ID_R=:ID_R");
					$requete4 = $dbh->prepare("SELECT * FROM favoris WHERE Pseudo=:Pseudo and ID_R=:ID_R");
					$requete5 = $dbh->prepare("SELECT * FROM carte WHERE Entree=1 AND ID_R=:ID_R");
					$requete6 = $dbh->prepare("SELECT * FROM carte WHERE Plat=1 AND ID_R=:ID_R");
					$requete7 = $dbh->prepare("SELECT * FROM carte WHERE Dessert=1 AND ID_R=:ID_R");

			        $requete2->bindParam(":ID_R", $ID_R);
			        $requete2->execute();

			        $requete3->bindParam(":ID_R", $ID_R);
			        $requete3->bindParam(":Pseudo",$_SESSION['Pseudo']);
			        $requete3->execute();

			        $requete4->bindParam(":ID_R", $ID_R);
			        $requete4->bindParam(":Pseudo",$_SESSION['Pseudo']);
			        $requete4->execute();

			        
			        $requete5->bindParam(":ID_R", $ID_R);
			        $requete5->execute();

			        
			        $requete6->bindParam(":ID_R", $ID_R);
			        $requete6->execute();

			        
			        $requete7->bindParam(":ID_R", $ID_R);
			        $requete7->execute();
							        

			        $note = $requete2->fetchAll();

			        $noteM = $note['0']['noteM'];
			       

			        $NbNotes= $note['0']['nb'];
			        $ANote = count( $requete3->fetchAll());
			        $Dejafavoris = count( $requete4->fetchAll());
			        $ListeEntrees=$requete5->fetchAll();
			        $ListePlats=$requete6->fetchAll();
			        $ListeDesserts=$requete7->fetchAll();


	$NomR=$restaurant[0]['NomR'];
	$Adresse=$restaurant[0]['Adresse'];
	$Ville=$restaurant[0]['Ville'];
	$CP=$restaurant[0]['CP'];
	$Tel=$restaurant[0]['Tel'];
	$Capacite=$restaurant[0]['Capacite'];
	$Description=$restaurant[0]['Description'];

	$commentaires=$requete->fetchAll();
	
?>