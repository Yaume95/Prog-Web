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
	  			session_start();
		   		$dbh= new PDO('mysql:host=127.0.0.1;dbname=projet_web','root','');

				$dbh->beginTransaction();

				$requete = $dbh->prepare("SELECT * FROM restaurant WHERE (ID_R=:ID_R)");

				$requete->bindParam(':ID_R', $ID_R);
				$ID_R= 0;//$_GET['ID_R'];

				$requete->execute();

				
				$restaurant=$requete->fetchAll();

				$_GLOBALS['NomR']=$restaurant[0]['NomR'];
				$_GLOBALS['Adresse']=$restaurant[0]['Adresse'];
				$_GLOBALS['Ville']=$restaurant[0]['Ville'];
				$_GLOBALS['CP']=$restaurant[0]['CP'];
				$_GLOBALS['Tel']=$restaurant[0]['Tel'];
				$_GLOBALS['Capacite']=$restaurant[0]['Capacite'];
				$_GLOBALS['Description']=$restaurant[0]['Description'];

		?>



<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Nom du restaurant :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['NomR']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Adresse :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['Adresse']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Code postal :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['CP']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Telephone :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['Tel']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Capacité :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['Capacite']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>


<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div>
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Description :</label>
		<label class="col-lg-6 col-md-6 col-sm-6"> <?php echo $_GLOBALS['Description']; ?></label>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<br>

<div class="col-lg-3 col-md-3 col-sm-3"></div>
<button class="btn btn-primary"> <span class="glyphicons glyphicons-edit"></span> Modifier</button>