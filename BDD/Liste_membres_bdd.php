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
     	echo "<td class='Pseudo'>". $membres[$i]['pseudo'] . "  -  " . $membres[$i]['prenom'] . ' ' . $membres[$i]['nom'] . "</td>";
     	echo "<td class='Promouvoir'> Promouvoir </td>";
     	echo "<td class='Ban'> Bannir </td>";
      	echo "</tr>";

      	$i++;
	}


?>