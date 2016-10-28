<?php session_start(); ?>
<!DOCTYPE html>
<html>
	

	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title> Restaurant </title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="./CSS/Styles/Restaurant.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="./Scripts/Favori.js"></script>
		<script src="./Scripts/SupprCommentaire.js"></script>
		
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


		 			echo '<span class="hide ID_R">'. $_GET["ID_R"] . '</span>';
				   	if(isset($_SESSION['IDSESSION']) )
				   	{
				   		if($Dejafavoris==0)
				   		{
				   			echo '(<button class="Favori btn btn-link">Ajouter aux favoris</button>)';	
				   		}
				   		else
				   		{
				   			echo '(<button class="FavoriR btn btn-link"> Retirer des favoris</button>)';
				   		}
				   	} 
		 	?>	
		 </small>

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
<!-- ============================================ Carte ============================================= -->
<div class="col-lg-1 col-md-1 col-sm-1"></div>
<div class="col-lg-10 col-md-10 col-sm-10">
	<hr>
</div>
<div class="col-lg-1 col-md-1 col-sm-1"></div>

<br><br>
<div class="container-fluid">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10 ">
		<table class=" table table-responsive table-bordered table-striped">
			<tbody>	
				<tr>
					<td class="col-lg-4 col-md-4 col-sm-4">
 						<h2 class="text-center">Entrées</h2>
					</td>

					<td class="col-lg-4 col-md-4 col-sm-4"> <h2 class="text-center">Plats</h2>
					</td>

					<td class="col-lg-4 col-md-4 col-sm-4"> <h2 class="text-center">Desserts</h2>
					</td>
				</tr>

				<tr>
					<td class="col-lg-4 col-md-4 col-sm-4">
 						<table class="taille-max">
 							<tbody>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 							</tbody>
 						</table>
					</td>

					<td class="col-lg-4 col-md-4 col-sm-4">
 						<table class="taille-max">
 							<tbody>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 							</tbody>
 						</table>
					</td>

					<td class="col-lg-4 col-md-4 col-sm-4">
 						<table class="taille-max">
 							<tbody>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em><br></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 								<tr class="couleur-cellule">
 									<td><label>je suis un plat</label></td>
 									<td class="text-right"><em>prix €</em></td>
 								</tr>
 							</tbody>
 						</table>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<div class="container-fluid">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="col-lg-10 col-md-10 col-sm-10">
		<button class="btn btn-primary">Ajouter un menu</button>
	</div>
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
</div>
<br>	
<?php include("Champ_Ajout_Menu.html");?>




	


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
								

				echo '<div class="media">
					  	  <div class="media-left">
					  	  	  <img src="./CSS/Images/Utilisateurs/image_defaut.jpg" alt="test"> 
						  </div>

						  <div class="media-body">
	   					  	  <h3 class="media-heading">' . $commentaires[$i]["Pseudo"] . '</h3>
	   					  	  <p><small><em> Le ' . $commentaires[$i]["Date"] . '</em></small></p><br>
	   						  <p>' . strip_tags($commentaires[$i]['Contenu']) . '</p>
	 					   </div>';
	 					   if(isset($_SESSION['Collaborateur']))
	 					   	{
	 					   		if($_SESSION['Collaborateur']==1)
			 					   echo '<div class="media-right">
								      <button class="btn btn-link supC"><span class="glyphicon glyphicon-remove"></span><span class="ID_C hide">'.$commentaires[$i]['ID_C'].'</span><span class="ID_R hide">'.$_GET['ID_R'].'</span></button>
								   </div>';
							}

				echo ' </div>';
				
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


