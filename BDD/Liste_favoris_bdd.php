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
		echo "<div class='row UnResultat'>";
	    echo "<button class='btn btn-link NomRestau'>". $rest[$i]['NomR'] . "</button><span class='hide'>". $rest[$i]['ID_R'] . "</span> <br>";
		echo "<div class='ContenuLien'>";
		echo "<small><label>" . $rest[$i]['Ville']  . '</label></small>' . '<br> ';
		echo "(Spécialité : " .  $rest[$i]['Specialite'] . ")" . "<br>";
		echo "N° Tel : " . $rest[$i]['Tel'];
		echo "</div></div>";

		$i+=1;

	}


?>