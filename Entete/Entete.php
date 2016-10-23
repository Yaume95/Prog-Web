<link rel="stylesheet" type="text/css" href="./CSS/Styles/Entete.css" >
<link rel="stylesheet" href="./CSS/Styles/Formulaire.css">
<?php 
	session_start();
?>


<nav class="navbar navbar-inverse">
		<div class="container-fluid">

			<div class="navbar-header ">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class = "sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="Acceuil.php">    Restolingo    </a>
			</div>

			<div class="navbar-collapse" id="myNavbar">
				<div class="visible"><ul class="nav navbar-nav navbar-right">
				<?php

					if(isset($_SESSION['IDSESSION']))
					{
						include("Utilisateur/utilisateur.php");
					}
					else
					{
						include("Inscription/inscription.html");
						include("Connection/connection.html");
					}

				?>
					
				</ul>
				</div>
			</div>
		</div>
	</nav>