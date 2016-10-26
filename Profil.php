	<?php
		session_start();
		if(!isset($_SESSION['IDSESSION']))
		{
			header('Location:Acceuil.php');
			exit();
		}
	?>

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
		?>

		<?php  

		   		$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

				$dbh->beginTransaction();

				$requete = $dbh->prepare("SELECT * FROM membre WHERE (pseudo=:pseudo)");

				$requete->bindParam(':pseudo', $pseudo);
				
				$pseudo=$_SESSION['Pseudo'];

				$requete->execute();

				$utilisateur=$requete->fetchAll();

				$_GLOBALS['Prénom']=$utilisateur[0]['prenom'];
				$_GLOBALS['Nom']=$utilisateur[0]['nom'];
				$_GLOBALS['Pseudo']=$utilisateur[0]['pseudo'];
				$_GLOBALS['Email']=$utilisateur[0]['email'];
				$_GLOBALS['DateNaissance']=$utilisateur[0]['date_naissance'];
				$_GLOBALS['Image']=$utilisateur[0]['ImageU'];

				

				
			?>
		
			<div class="container" id="Utilisateur">
			<h1>
				<?php
					 echo "<img src='" . $_GLOBALS['Image'] . "' class='img-circle img-thumbnail img-responsive' width='150' height='150'>";
					 echo $_SESSION['Prénom'] . ' ' . $_SESSION['Nom']; 
				?>
	   		</h1>	
	  	</div>

	  	
	
  			<?php include('Profil/Visuel.php'); ?>

	</body>

</html>