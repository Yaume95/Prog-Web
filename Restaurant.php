<?php session_start(); ?>
<!DOCTYPE html>
<html>
	

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title> Restauraurant </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Restaurant.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="./Scripts/Favori.js"></script>
		
	</head>

	<body>
<!-- ====================== Entete + récupération données du restaurant ========================-->
	<?php  
	  			include("./Entete/Entete.php");
	  			include("./BDD/Infos_Restau_bdd.php");
	?>

<!-- ========================= Affichage nom restaurant + Ajout favoris ======================-->

	<div class="row text-center">
		 <h1> <?php echo $NomR; ?> </h1>
		 <small>
		 	<?php  

		 			$requete = $dbh->prepare("SELECT Image FROM restaurant WHERE NomR=:NomR");
					$requete->bindParam(":NomR", $NomR);
					$requete->execute();

					$Adr = $requete->fetchAll();

		 			$ID_R=intval($_GET['ID_R']);

					$requete2 = $dbh->prepare("SELECT COUNT(*) AS nb,round(avg(Note),1) AS noteM FROM notes WHERE Note>=0 and ID_R=:ID_R");
					$requete3 = $dbh->prepare("SELECT * FROM notes WHERE Pseudo=:Pseudo and ID_R=:ID_R");
					$requete4 = $dbh->prepare("SELECT * FROM favoris WHERE Pseudo=:Pseudo and ID_R=:ID_R");

			        $requete2->bindParam(":ID_R", $ID_R);
			        $requete2->execute();

			        $requete3->bindParam(":ID_R", $ID_R);
			        $requete3->bindParam(":Pseudo",$_SESSION['Pseudo']);
			        $requete3->execute();

			        $requete4->bindParam(":ID_R", $ID_R);
			        $requete4->bindParam(":Pseudo",$_SESSION['Pseudo']);
			        $requete4->execute();

			        $note = $requete2->fetchAll();

			        $noteM = $note['0']['noteM'];
			       

			        $NbNotes= $note['0']['nb'];
			        $ANote = count( $requete3->fetchAll());
			        $Dejafavoris = count( $requete4->fetchAll());
			        $AdrRestau =$Adr['0']['Image'];


		 			echo '<span class="hide">'. $_GET["ID_R"] . '</span>';
				   	if(isset($_SESSION['IDSESSION']) )
				   	{
				   		if($Dejafavoris==0)
				   		{
				   			echo '(<button class="Favori btn btn-link">Ajouter aux favoris</button>)';	
				   		}
				   		else
				   		{
				   			echo '(<button class="Favori btn btn-link"> Retirer des favoris</button>)';
				   		}
				   	} 
		 	?>	
		 </small>

		 	<br>
	</div>

<!-- ===================== Image du restaurant  ============================== -->

	<div class="col-lg-12 col-md-12 col-sm-12 text-center" id="Imagerestau">

	<?php
		include("./BDD/Connection_BDD/Connection_serveur.php");

		

		if($AdrRestau!= NULL)
		{
			echo "<img src='" . $AdrRestau. "' class='img-rounded'>";
		}

		

	?>
	
	</div>

<!-- ===============================  Fiche Technique // Note  =============================== -->

<div class="row">
	<div class="col-lg-2 col-md-2 col-sm-2"></div>
	<div class="col-lg-4 col-md-4 col-sm-4" id="Contenu">
			<h2 > Fiche Technique :</h2><br>
			<div class="row phrase">
				<p> Situé à <b><?php echo $Ville; ?></b>, <b><?php echo $Adresse; ?> - <?php echo $CP; ?></b>.</p>
			</div>
			
			<div class="row phrase">
				<p> Joignable par téléphone au <b><?php echo $Tel; ?></b>.</p>
			</div>

			<div class="row phrase">
				<p> Ce restaurant est doté d'une <b>capacité de <?php echo $Capacite; ?> places</b>.</p>
			</div>
			
			<div class="row phrase">	
				<label> Description du restaurant</label> : <?php echo $Description; ?> </label>
			</div>
	</div>
	
	<hr>

	<?php if(isset($_SESSION['IDSESSION']))
	{
		if($ANote==0)
		{
			include("./Restaurant/Noter.php");
		}
		else if($NbNotes>0) include("./Restaurant/Note.php");
	} 
	else if($NbNotes>0) include("./Restaurant/Note.php");
	?>
	

</div>			

<br>
<br>
<br>

<!-- ========================================  Commentaires  ======================================== -->

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10"><hr></div>
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>

<div class="container" id="BoxCommentaires">
	<h2 class="text-center"> Commentaires : </h2>

	<br>

		<?php 
			$i=0;

			while($i<count($commentaires))
			{
				list($annee,$mois,$jour)=explode('-',$commentaires[$i]['Date']);				

				echo "<div class='media'>";
				
				echo "<div class='media-body'>";
				echo "<h4 class='media-heading'>" . $commentaires[$i]['Pseudo'] . "</h4>"; 
				echo "<p><small><em> Le " . $jour . "/" . $mois . "/" . $annee . "</em></small></p></div>";
				
				echo "<div class='row'>";
				echo "<div class='col-lg-2 col-md-2 col-sm-2'></div>";
				echo "<div class='col-lg-10 col-md-10 col-sm-10 contenu'>";
				echo "<p>" . strip_tags($commentaires[$i]['Contenu']) . "</p><br>";
				echo "</div></div>";
				
				echo "<hr>";
				$i++;


			}
		?>


	<!-- ========================================  Ajouter Commentaire  ======================================== -->
	
	<?php
		if(isset($_SESSION['IDSESSION']))
		{
			include("./Restaurant/Ajout/Ajout_Commentaire.php");
		}
	?>

</div>


</body>
</html>


