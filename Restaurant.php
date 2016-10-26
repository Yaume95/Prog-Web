<?php session_start(); ?>
<!DOCTYPE html>
<html>
	

	<head>
		<meta charset="utf-8" />
		<title> Restauraurant </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Restaurant.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="./Scripts/Favori.js"></script>
		
	</head>

	<body>

	<?php  
	  			include("./Entete/Entete.php");
	  			include("./BDD/Infos_Restau_bdd.php");
	?>

	<div class="row text-center">
		 <h1> <?php echo $_GLOBALS['NomR']; ?> </h1><small><?php  echo '<span class="hide">'.$_GET["ID_R"].'</span>(<button class="Favori btn btn-link">Ajouter aux favoris</button>)'; ?></small><br>
	</div>


	<div class="col-lg-12 col-md-12 col-sm-12 text-center" id="Imagerestau">

	<?php
		include("./BDD/Connection_BDD/Connection_serveur.php");

		$requete = $dbh->prepare("SELECT Image FROM restaurant WHERE NomR=:NomR");

		$requete->bindParam(":NomR", $_GLOBALS['NomR']);
		

		$requete->execute();

		$AdrRestau = $requete->fetchAll();


		if($AdrRestau['0']['Image']!= NULL)
		{
			echo "<img src='" . $AdrRestau['0']['Image'] . "' class='img-rounded img-thumbnail img-responsive'>";
		}

	?>
	
	</div>



<div class="row">
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-8 col-md-8 col-sm-8" id="Contenu">
					
					
					<div class="row phrase">
						<p> Situé à <b><?php echo $_GLOBALS['Ville']; ?></b>, <b><?php echo $_GLOBALS['Adresse']; ?> - <?php echo $_GLOBALS['CP']; ?></b>.</p>
					</div>
					
					<div class="row phrase">
						<p> Joignable par téléphone au <b><?php echo $_GLOBALS['Tel']; ?></b>.</p>
					</div>

					<div class="row phrase">
						<p> Ce restaurant est doté d'une <b>capacité de <?php echo $_GLOBALS['Capacite']; ?> places</b>.</p>
					</div>
					
					<div class="row phrase">	
						<label> Description du restaurant</label> : <?php echo $_GLOBALS['Description']; ?> </label>
					</div>
			</div>
<div class="col-lg-3 col-md-3 col-sm-3"></div>
</div>			

<br>
<br>
<br>

<!-- ========================================  Commentaires  ======================================== -->

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="ligne-verticale col-lg-9 col-md-9 col-sm-9"></div>
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>

<div class="container" id="BoxCommentaires">
	<h2 class="text-center"> Commentaires : </h2>

		<?php 
			$i=0;

			while($i<count($_GLOBALS['commentaires']))
			{
				list($annee,$mois,$jour)=explode('-',$_GLOBALS['commentaires'][$i]['Date']);

				

				echo "<div class='media'>";
				echo "<div class=' col-lg-1 col-md-1 col-sm-1'></div>";
				echo "<div class='media-body'>";
				echo "<h4 class='media-heading'>" . $_GLOBALS['commentaires'][$i]['Pseudo'] . "</h4>"; 
				echo "<p><small><em> Le " . $jour . "/" . $mois . "/" . $annee . "</em></small></p></div>";
				
				echo "<div class='row'>";
				echo "<div class='col-lg-2 col-md-2 col-sm-2'></div>";
				echo "<div class='col-lg-10 col-md-10 col-sm-10 contenu'>";
				echo "<p>" . strip_tags($_GLOBALS['commentaires'][$i]['Contenu']) . "</p><br>";
				echo "</div></div>";
				
				echo "<hr>";
				$i++;


			}
		?>


	<!-- ========================================  Ajouter Commentaire  ======================================== -->
	
	<div >
		<form method="post" action="./BDD/Ajout_Commentaire.php?ID_R=<?php echo $_GET['ID_R']?>">
			<div class="form-group">
				<div class="col-lg-5 col-md-5 col-sm-5">
					<input type="texte" class="form-control" value="<?php echo $_SESSION['Pseudo'] ?>" disabled>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7">
			</div>
			
			<br><br><br>	

			<div class="form-group">
				<div class="row">
					<label class="col-lg-2 col-md-2 col-sm-2 control-label"> Commentaires :</label>
				</div>
				<div class="row">
					<div class="col-lg-2 col-md-2 col-sm-2"></div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<textarea class="form-control" rows="5" name="NewComm" placeholder="Entrez votre commentaire ici !" required></textarea>
					</div>
				</div>
			</div>
			
			<div class="form-group ">
				<div class="col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-lg-2 col-md-2 col-sm-2">
					<input type="submit" value="Vaider" class="btn btn-primary">
				</div>
			</div>

		</form>

	</div>

</div>

</body>
</html>


