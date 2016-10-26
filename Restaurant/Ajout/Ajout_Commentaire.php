<div >
		<form method="post" action="./BDD/Ajout_Commentaire_bdd.php?ID_R=<?php echo $_GET['ID_R']?>">
			<div class="form-group">
			<div class="col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-lg-5 col-md-5 col-sm-5">
					<input type="texte" class="form-control" value="<?php echo $_SESSION['Pseudo'] ?>" disabled>
				</div>
				<div class="col-lg-7 col-md-7 col-sm-7">
			</div>
			
			<br><br><br>	

			<div class="form-group">
				<div class="row">
				<div class="col-lg-2 col-md-2 col-sm-2"></div>
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