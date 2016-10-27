<div class="">
	<h2 > Vous souhaitez noter ce restaurant :</h2>
		<div class="col-lg-1 col-md-1 col-sm-1"></div>

	<form method="post" action="./BDD/Ajouter_Note_bdd.php?ID_R=<?php echo intval($_GET['ID_R']); ?>"  class="form-horizontal col-lg-4 col-md-4 col-sm-1 ">
		<div class="form-group text-center">
			<br>
			<div class="col-lg-1 col-md-1 col-sm-1"></div>
			<div class="col-lg-4 col-md-4 col-sm-4" >
			  	<select class="form-control" id="Select" name="note">
				    <option value="1">1</option>
				    <option value="2">2</option>
				    <option value="3">3</option>
				    <option value="4">4</option>
				    <option value="5">5</option>
				    <option value="6">6</option>
				    <option value="7">7</option>
				    <option value="8">8</option>
				    <option value="9">9</option>
				    <option value="10">10</option>
			  </select>
		  </div>

		
		</div>


		<div class="form-group">
		<div class="col-lg-2 col-md-2 col-sm-2"></div>
			<div class="col-lg-1 col-md-1 col-sm-1">
				<input type="submit" value="Ok !" class="btn btn-primary">
			</div>
		</div>
</div>

	</form>
</div>