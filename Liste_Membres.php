	<?php
		session_start();
	
		if(!isset($_SESSION['IDSESSION']) || $_SESSION['Collaborateur']==0)
		{
			header('Location:Acceuil.php');
			exit();
		}
	?>

	<!DOCTYPE html>
	<html>

		<head>
			<meta charset=utf-8 />
			<meta name="auteurs" content="Guillaume Boyer et Abdelsalem Hedhili, étudiants en 2ème année d'Ecole d'ingénieur"/>
			<title> Gérer les utilisateurs </title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="./CSS/Styles/Liste_Membres.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="./Scripts/Liste_membres.js"></script>
		</head>

		<body>

		<?php include("./Entete/Entete.php"); ?> 

		<div class="text-center"">
			<h2> Voici la liste des utilisateurs : </h2>
		</div>

		<div class="col-lg-3 col-md-3 col-sm-3"></div>
		<div class="table-responsive col-lg-6 col-md-6 col-sm-6">
  			<table class="table">
  				<tbody>
					<?php include("./BDD/Liste_membres_bdd.php"); ?>
				</tbody>
			</table>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-3"></div>

		</body>
	</html>