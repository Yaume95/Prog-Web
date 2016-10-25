<?php session_start(); ?>
<!DOCTYPE html>
<html>
	

	<head>
		<meta charset="utf-8" />
		<title> Restauraurant </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Restaurant.css">
		
	</head>

	<body>
	<?php  
	  			include("./Entete/Entete.php");
	  			include("./BDD/Infos_Restau_bdd.php");
		?>

<div class="row text-center">
	<label> <h1> <?php echo $_GLOBALS['NomR']; ?> </h1></label><br>
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

<div class="row">
<div class="col-lg-2 col-md-2 col-sm-2"></div>
<div class="col-lg-8 col-md-8 col-sm-8 text-center" id="Contenu">
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
<div class="col-lg-2 col-md-2 col-sm-2"></div>
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
<!-- ========================================  Commentaires  ======================================== -->

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="ligne-verticale col-lg-9 col-md-9 col-sm-9"></div>
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>

<div class="container">
	<h2 class="text-center"> Commentaires : </h2>

		<?php 
			$i=0;

			while($i<count($_GLOBALS['commentaires']))
			{
				list($annee,$mois,$jour)=explode('-',$_GLOBALS['commentaires'][$i]['Date']);

				if($i!=0)
				{
					echo "<div class='row'>";
					echo "<div class='col-lg-1 col-md-1 col-sm-1'></div>";
					echo "<div class='ligne-verticale col-lg-9 col-md-9 col-sm-9'></div>";
					echo "<div class='col-lg-1 col-md-1 col-sm-1'></div>";
					echo "</div>";
				}

				echo "<div class='container'>";
				echo "<div class='row'>";
				echo "<div class='col-lg-1 col-md-1 col-sm-1'></div>";
				echo "<div class='col-lg-2 col-md-2 col-sm-2'>";
				echo "<h4>" . $_GLOBALS['commentaires'][$i]['Pseudo'] . "</h4>"; 
				echo "<p><small><em> Le " . $jour . "/" . $mois . "/" . $annee . "</em></small></p></div>";
				echo "<div class='col-lg-9 col-md-9 col-sm-9'></div></div>";

				echo "<div class='row'>";
				echo "<div class='col-lg-2 col-md-2 col-sm-2'></div>";
				echo "<div class='col-lg-8 col-md-8 col-sm-8 contenu'>";
				echo "<p>" . strip_tags($_GLOBALS['commentaires'][$i]['Contenu']) . "</p><br>";
				echo "</div></div></div>";
				
				$i++;


			}
		?>
</div>



</body>
</html>


