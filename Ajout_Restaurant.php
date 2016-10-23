		<?php 
		
		include("./Entete/Entete.php"); 
		if/*( empty($_SESSION['Collaborateur'])/* || $_SESSION['Collaborateur']==0 )
		{
			header('Location:Acceuil.php');
			exit();

		}
		else if*/ ($_SESSION['Collaborateur']==0)
		{
			header('Location:Acceuil.php');
			
		}

	?>

	<!DOCTYPE html>
	<html>

		<head>
			<meta charset=utf-8 />
			<meta name="auteurs" content="Guillaume Boyer et Abdelsalem Hedhili, étudiants en 2ème année d'Ecole d'ingénieur"/>
			<title>Ajout de restaurant</title>
			<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="./Scripts/Ajout_Restaurant.js"></script>
		</head>

		
		<body>
		
		
		<br>
		<h1 class="text-center"> Ajoutez vos restaurants vià cette page : </h1>
		<br><br>
		
		
			<form  class="form-horizontal" method="post" action="./BDD/Ajout_Restaurant_bdd.php">
				<br><br>
				
					<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label Label-Form">Nom :</label>
						<div class="col-lg-4 col-md-4 col-sm-4 has-feedback">
							<input type="text" class="form-control nomR" name="NomR" placeholder="Entrez le nom de votre restaurant" required>
							<div class="hide" id="IconeNomR">
								<span class="glyphicon glyphicon-remove form-control-feedback erreur"></span>
								<span class="glyphicon glyphicon-ok form-control-feedback valide"></span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 has-error hide">
							<label class="control-label">
								Entre 2 et 30 caractères, pas de caractères spéciaux
							</label>
						</div>
					</div>

				<br><br>

				<?php include("./Restaurant/Ajout/paysMonde.php"); ?>

				<br><br>

				<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label Label-Form">Adresse :</label>
						<div class="col-lg-4 col-md-4 col-sm-4 has-feedback">
							<input type="text" class="form-control adresseR" name="Adresse" placeholder="Entrez l'adresse du restaurant" required>
							<div class="hide" id="IconeAdresse">
								<span class="glyphicon glyphicon-remove form-control-feedback erreur"></span>
								<span class="glyphicon glyphicon-ok form-control-feedback valide"></span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 has-error hide">
							<label class="control-label">
								Adresse non valide
							</label>
						</div>
					</div>


				<br><br>

				<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label Label-Form">Code postal:</label>
						<div class="col-lg-4 col-md-4 col-sm-4 has-feedback">
							<input type="text" class="form-control CP" name="CP" placeholder="Entrez le code postal correspondant à l'adresse" required>
							<div class="hide" id="IconeCP">
								<span class="glyphicon glyphicon-remove form-control-feedback erreur hide"></span>
								<span class="glyphicon glyphicon-ok form-control-feedback valide hide"></span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 has-error hide">
							<label class="control-label">
								10 chiffres
							</label>
						</div>
				</div>

				<br><br>

				<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label Label-Form">N° Téléphone :</label>
						<div class="col-lg-4 col-md-4 col-sm-4 has-feedback">
							<input type="text" class="form-control telR" name="Tel" placeholder="Entrez le numéro du restaurant" required>
							<div class="hide" id="IconeTel">
								<span class="glyphicon glyphicon-remove form-control-feedback erreur hide"></span>
								<span class="glyphicon glyphicon-ok form-control-feedback valide hide"></span>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 has-error hide">
							<label class="control-label">
								10 chiffres
							</label>
						</div>
				</div>
		
				<br><br>

				

				<div class="form-group">
						<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label Label-Form"> Capacite :</label>
						<div class="col-lg-4 col-md-4 col-sm-4 has-feedback">
							<input type="number" class="form-control capaciteR" name="Capacite" placeholder="Entrez le nombre de personnes max. pouvant être reçues simultanément" required>
							<div class="hide" id="IconeCapacite">
								<span class="glyphicon glyphicon-remove form-control-feedback erreur hide"></span>
								<span class="glyphicon glyphicon-ok form-control-feedback valide hide"></span>

							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 has-error hide">
							<label class="control-label">
								Superieur à 0
							</label>
						</div>
				</div>
				
				<br><br>
				<div class="form-group">
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					<label class="col-lg-2 col-md-2 col-sm-2 control-label" for="Image">  Image :</label>
					<div class="col-lg-4 col-md-4 col-sm-4"><input type="file" name="Image" accept="image/*"> </div>
				</div>

				<br><br>	
				
				<div class="form-group row">
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
						<label class="col-lg-2 col-md-2 col-sm-2 control-label" for="Desciption"> Description :</label>
						<div class="col-lg-4 col-md-4 col-sm-4">
	     					<textarea class="form-control" rows="5" name="Description"></textarea>
	    				</div>
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
				</div>
				
				<div class="form-group ">
					<div class="col-lg-5 col-md-5 col-sm-5"></div>
					<div class="col-lg-2 col-md-2 col-sm-2">
						<input type="submit" value="Ajouter" class="btn btn-primary">
					</div>
				</div>

		</form>
	</body>
</html>
