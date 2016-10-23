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

			$_GLOBALS['Prénom']=$utilisateur[0]['prenom'];
			$_GLOBALS['Nom']=$utilisateur[0]['nom'];
			$_GLOBALS['Pseudo']=$utilisateur[0]['pseudo'];
			$_GLOBALS['Email']=$utilisateur[0]['email'];
			$_GLOBALS['DateNaissance']=$utilisateur[0]['date_naissance'];

		?>
		

		<div class="container" id="Utilisateur">
		<h1>
			<img src="./CSS/Images/image_defaut.jpg" class="img-circle" alt="Photo_profil" >
			<?php echo $_SESSION['Prénom'] . ' ' . $_SESSION['Nom']; ?>
   		</h1>
	  	</div>
	
  			<?php include('Profil/Modif.php'); ?>

	</body>

</html>