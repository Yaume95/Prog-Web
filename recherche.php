	<?php session_start(); ?>
	<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<meta name="auteurs" content="Guillaume Boyer et Abdelsalem Hedhili, étudiants en 2ème année d'Ecole d'ingénieur"/>
			<title>Recherche</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="./CSS/Styles/Recherche.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="./Scripts/recherche.js"></script>
			<script src="./Scripts/supprRestau.js"></script>
		</head>

		<body>

		<?php include("Entete/Entete.php"); ?>


		<!--============================ Barre de recherche ======================= -->

		<div class= "container-fluid" id="Searchbar">
			<form class="form-inline" action="recherche.php" method ="get">
				<div class="col-lg-3 col-md-3 col-sm-3"></div>
				<div class="input-group col-lg-8 col-md-8 col-sm-8">
					<input type="text" name="recherche" class="form-control" placeholder="Choisissez les mots clés pour votre recherche...">
					<span class="input-group-btn">
						<input class="btn btn-primary" type="submit" value="Chercher"><span class="glyphicon glyphicon-search"></span>
					</span>
				</div>
				</form>
			<div class="col-lg-1 col-md-1 col-sm-1"></div>
		</div>

<div class="container-fluid" id="Texte">
	<div class="col-lg-2 col-md-2 col-sm-2"></div>
	<div class="col-lg-8 col-md-8 col-sm-8">

	<?php
		try
		{
			$user='root';
			$pw='';
			$bdd='projet_web';
			
			$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web', 'root','');

			$dbh->beginTransaction();

			$stmt = $dbh->prepare("SELECT * FROM restaurant WHERE  NomR LIKE :rech");

			
			$stmt->bindParam(':rech',$rech);

			
			$rech=$_GET['recherche'];
			$rech= "%".$rech."%";
			

			$stmt->execute();
			$donnees=$stmt->fetchAll();

			$nbresultat=count($donnees);

			echo "<div class='row text-center' id='NbRes'>";
			if($nbresultat>1)
			{
				echo '<h4><b>' . $nbresultat . ' résultats pour votre votre recherche :</b></h4>';	
			}
			else
			{
				echo '<h4><b>' . $nbresultat . ' résultat pour votre votre recherche :</b></h4>';	
			}
			echo "</div>";

			
			
			$i=0;
			while ($i<count($donnees) )
			{		
				$Image = $donnees[$i]["Image"];
				echo '<div class="media">
					  	  <button class="btn btn-link NomRestau media-heading">' . $donnees[$i]["NomR"] . '</button><span class="hide">' . $donnees[$i]['ID_R'] . '</span>
					  	  <div class="media-left">
					  	  	  <img src="' . $Image . '" width="82" height="82" alt="test"> 
						  </div>
							
						  <div class="media-body">
	   					  	  
	   					  	  <p><label>' . $donnees[$i]['Ville']  . '</label></small></p>
	   						  <p>' . '(Spécialité : ' .  $donnees[$i]['Specialite'] . ")" . '</p>
	   						  <p>' . 'N° Tel : ' .  $donnees[$i]['Tel']  . '</p>
	 					   </div>';
	 					   if(isset($_SESSION['Collaborateur']))
	 					   	{
	 					   		if($_SESSION['Collaborateur']==1)
			 					   echo '<div class="media-right">
								      <button class="btn btn-link supR"><span class="glyphicon glyphicon-remove"></span></button>
								   </div>';
							}

				echo ' </div>';
				
				echo "<hr>";

		     	$i+=1;

			}
		 

		}	
		catch(PDOException $e)
		{
			print "Erreur ! : " . $e->getMessage();
		} 



	?>
	</div>
</div>
</body>
</html>