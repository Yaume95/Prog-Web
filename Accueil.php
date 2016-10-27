	<?php session_start(); ?>

	<!DOCTYPE html>
	<html>
		<head>
			<meta charset=utf-8 />
			<meta name="auteurs" content="Guillaume Boyer et Abdelsalem Hedhili, étudiants en 2ème année d'Ecole d'ingénieur"/>
			<title>Acceuil</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<link rel="stylesheet" href="./CSS/Styles/Accueil.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		</head>

		<body>

		<?php include("Entete/Entete.php"); ?>


		<!--============================ Barre de recherche ======================= -->

		<div class= "container-fluid" id="Searchbar">
			<form class="form-inline" action="Recherche.php" method ="get">
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

		
		<!--============================ Image ======================= -->

        <div id="ImageAccueil">
          <img src="./CSS/Images/restaurant3.jpg" alt="Image" class='img-responsive img-rounded'>
        </div>


    <!-- ==================== Corps de la page ==================== -->

	<div class="container-fluid text-center" id="Texte">
		<div class="col-lg-4 col-md-4 col-sm-4 ligne-verticale">
			<h1>De nombreux restaurants</h1><br>
			<p>
				Restolingo vous permet de chercher les restaurants qui vous correspondent le mieux en fonction de vos critères et envies du moment.
			</p>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 ligne-verticale">
			<h1>Disponibles sur demande</h1><br>
			<p>
				Retenez-vos restaurants et vos menus favoris une fois inscrit, et n'hésitez pas à commenter tout restaurant de votre choix. <br>
			</p>
			<br>
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4">
			<h1>Vous êtes restaurateur ?</h1><br>
			<p>
				Ajoutez votre restaurant pour le faire découvrir en devenant un de nos collaborateurs.
			</p>
		</div>
	</div>
	
	

	</body>
</html>
