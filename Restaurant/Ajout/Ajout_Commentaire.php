
	<div class="media">
		<div class="media-left">
	    	
	  	</div>
	  	<div class="media-body">
	    	<h3 class="media-heading"><?php echo $_SESSION['Pseudo'] ?></h3>
	    	<p><label>Commentaire :</label></p><br>
	    	<form action="./BDD/Ajout_Commentaire_bdd.php" method="post">
	    		<div class="col-lg-8 col-md-8 col-sm-8 form-group">
					<textarea class="form-control" rows="5" name="NewComm" placeholder="Entrez votre commentaire ici !" required></textarea>
				</div>
				<div class="col-lg-5 col-md-5 col-sm-5">

				
				<div class="col-lg-2 col-md-2 col-sm-2">
					<input type="submit" value="Valider" class="btn btn-primary">
				</div>
	    	</form>
	  	</div>
	</div>
