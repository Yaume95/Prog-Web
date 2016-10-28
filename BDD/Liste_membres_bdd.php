<?php

	if(!isset($_SESSION['Collaborateur']) or $_SESSION['Collaborateur']==0 ) 
	{
		header('Location:../Accueil.php');
		exit();
	}
	include('./BDD/Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete = $dbh->prepare("SELECT * FROM membre WHERE (Collaborateur=0)");

	$requete->execute();

	$membres=$requete->fetchAll();

	$nbmembres=count($membres);

	$i=0;

	while($i<$nbmembres)
	{


		echo "<tr>";
		echo "<td class='Pseudo'>". $membres[$i]['pseudo'] . "</td><td>" . $membres[$i]['prenom'] . '</td><td> ' . $membres[$i]['nom'] . "</td>";

		echo "<td><button class='btn btn-success btn-sm Promouvoir'>Promouvoir</button></td>";

		if($membres[$i]['banni']=="0")
		{
     		echo "<td><button class='btn btn-danger btn-sm Ban'>Bannir</button></td>";
		}
		else if($membres[$i]['banni']=="1")
		{
     		echo "<td><button class='btn btn-warning btn-sm Deban'>Débannir</button></td>";
		}
     	
		echo "<td><button class='btn btn-danger btn-sm Supprimer'>Supprimer</button></td>";

     	
      	echo "</tr>";

      	$i++;
	}


?>