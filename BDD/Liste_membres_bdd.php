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
     	echo "<td><button class='Promouvoir'>Promouvoir</button></td>";
     	echo "<td><button class='Ban'>Bannir</button>  </td>";
      	echo "</tr>";

      	$i++;
	}


?>