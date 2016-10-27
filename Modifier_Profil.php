<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset=utf-8 />
		<title> Profil </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Profil.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>

		<?php 
			include("./Entete/Entete.php");


	   		$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

			$dbh->beginTransaction();

			$requete = $dbh->prepare("SELECT * FROM membre WHERE (prenom=:prenom) AND (nom=:nom)");

			$requete->bindParam(':prenom', $prenom);
			$requete->bindParam(':nom',$nom);
			
			$prenom=$_SESSION['Prénom'];
			$nom=$_SESSION['Nom'];

			$requete->execute();

			$utilisateur=$requete->fetchAll();

			$Prenom=$utilisateur[0]['prenom'];
			$Nom=$utilisateur[0]['nom'];
			$Pseudo=$utilisateur[0]['pseudo'];
			$Email=$utilisateur[0]['email'];
			$DateNaissance=$utilisateur[0]['date_naissance'];
			$Image=$utilisateur[0]['ImageU'];

		?>
		

		<div class="container" id="Utilisateur">
		<h1>
			<?php
					 echo "<img src='" . $Image . "' class='img-circle img-thumbnail img-responsive' width='150' height='150'>";
					 echo $_SESSION['Prénom'] . ' ' . $_SESSION['Nom']; 
				?>
   		</h1>
	  	</div>
	
  			<?php include('Profil/Modif.php'); ?>

	</body>

</html>