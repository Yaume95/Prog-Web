<!DOCTYPE html>
<html>
	<?php  
	  			include("./Entete/Entete.php");
	  			include("./BDD/Infos_Restau_bdd.php");
		?>

	<head>
		<meta charset=utf-8 />
		<title> <?php echo $_GLOBALS['NomR']; ?> </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Restaurant.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>

	<body>

<div class="row text-center">
	<label> <h1><?php echo $_GLOBALS['NomR']; ?></h1></label><br>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class="container">
	<ul class="nav nav-pills nav-justified red">
		<li class="active"><a data-toggle="tab" href="#Fiche">Fiche Technique</a></li>
		<li><a data-toggle="pill" href="#Eval">Évaluation</a></li>
	</ul>

	<div class="tab-content">

		<div id="Fiche" class="tab-pane fade in active container">
			
			<div class="col-lg-8 col-mg-8 col-sm-8" id="Contenu">
					<h1></h1>
					<div class="row phrase">
						<label> Situé à <?php echo $_GLOBALS['Ville']; ?>, <?php echo $_GLOBALS['Adresse']; ?> - <?php echo $_GLOBALS['CP']; ?>.</label>
					</div>
					
					<div class="row phrase">
						<label> Joignable par téléphone au <?php echo $_GLOBALS['Tel']; ?>.</label>
					</div>

					<div class="row phrase">
						<label> Ce restaurant est doté d'une capacité de <?php echo $_GLOBALS['Capacite']; ?> places.</label>
					</div>
					
					<div class="row phrase">	
						<label> Description du resurant : <?php echo $_GLOBALS['Description']; ?> </label>
					</div>
			</div>
			
		</div>

		<div id="Eval" class="tab-pane fade text-center">
			
			<h1></h1>
					<div class="row phrase">
						<label> Cuisine : </label>
					</div>
					
					<div class="row phrase">
						<label> Service : </label>
					</div>

		</div>
	</div>
</div>


<?php
	unset($_GLOBALS);
?>
