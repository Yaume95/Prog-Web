<?php
	include('./BDD/Connection_BDD/Connection_serveur.php');

	$dbh->beginTransaction();

	$requete = $dbh->prepare("SELECT * FROM favoris NATURAL JOIN restaurant WHERE (Pseudo=:pseudo)");

	$requete->bindParam(':pseudo', $pseudo);

	$pseudo = $_SESSION['Pseudo'];

	$requete->execute();

	$rest=$requete->fetchAll();

	$nbresultat=count($rest);
			
	$i=0;
	while ($i<$nbresultat )
	{
	


		echo "<tr>";
		echo "<td> <button class='btn btn-link NomRestau'>". $rest[$i]['NomR'] . "</button><small><label>" . $rest[$i]['Ville'] . ", " . $rest[$i]['Tel'] . "</label></small>";
		echo "<span class='hide'>". $rest[$i]['ID_R'] . "</span></td>";

		echo "<td><button class='btn btn-warning btn-sm SupprimerFav'>Supprimer</button></td>";


		echo "</tr>";
		$i+=1;

	}


?>