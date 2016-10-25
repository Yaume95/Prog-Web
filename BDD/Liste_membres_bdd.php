<?php

	$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

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

		echo "<td><button class='Modifier'>Modifier</button></td>";
		echo "<td><button class='Promouvoir'>Promouvoir</button></td>";

		if($membres[$i]['banni']=="0")
		{
     		echo "<td><button class='Ban'>Bannir</button>  </td>";
		}
		else if($membres[$i]['banni']=="1")
		{
     		echo "<td><button class='Deban'>Débannir</button>  </td>";
		}
     	
		echo "<td><button class='Supprimer'>Supprimer</button></td>";

     	
      	echo "</tr>";

      	$i++;
	}


?>