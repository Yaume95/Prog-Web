<form action="./BDD/Modif_bdd.php" method="post">
<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="form-group">
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Prénom :</label>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input  class="form-control" type="text" value="<?php echo $Prenom; ?>" name="prenom">
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="form-group">
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Nom :</label>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input  class="form-control" type="text" value="<?php echo $Nom; ?>" name="nom">
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="form-group">
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Pseudo:</label>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input  class="form-control" type="text" value="<?php echo $Pseudo; ?>" name="pseudo">
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="form-group">
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Addresse mail :</label>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input  class="form-control" type="text" value="<?php echo $Email; ?>" name="email">
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<div class="row">
	<div class="col-lg-1 col-md-1 col-sm-1"></div>
	<div class="form-group">
		<label class="col-lg-2 col-md-2 col-sm-2 NomChamp"> Né le :</label>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<input  class="form-control" type="date" value="<?php echo $DateNaissance; ?>" name="datenaissance">
		</div>
	</div>
	<div class="col-lg-5 col-md-5 col-sm-5"></div>
</div>

<br>

<div class="col-lg-3 col-md-3 col-sm-3"></div>
<a class="btn btn-primary" href="./Profil.php"> <span class="glyphicons glyphicons-edit"></span> Annuler</a>	
<input type="submit" class="btn btn-primary" value="Confirmer">
</form>