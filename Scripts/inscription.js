$(document).ready(function()
{	

	$test1 = false;
	$test2 = false;
	$test3 = false;
	$test4 = false;
	

	$(".nom").on('keyup change paste',function()
	{
		$nom = $('.nom').val();
		$regNom = /^[a-zA-Z]{2,15}$/;  //entre 1 et 15 caractères sans caractères spéciaux
		$test1 = $regNom.test($nom);

		if($nom=="")
		{
			$("#IconeNom").addClass("hide");
			$("#IconeNom").parent("div").parent("div").children("div.has-error").addClass("hide");

		}

		else if($test1)
		{
			$("#IconeNom").removeClass("hide");
			$("#IconeNom").removeClass("has-error");
			$("#IconeNom").addClass("has-success");
			$("#IconeNom").children(".erreur").addClass("hide");
			$("#IconeNom").children(".valide").removeClass("hide");
			$("#IconeNom").parent("div").parent("div").children("div.has-error").addClass("hide");

		}

		else
		{
			$("#IconeNom").removeClass("hide");
			$("#IconeNom").addClass("has-error");
			$("#IconeNom").removeClass("has-success");
			$("#IconeNom").children(".erreur").removeClass("hide");
			$("#IconeNom").children(".valide").addClass("hide");
			$("#IconeNom").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});



	$(".prenom").on('keyup change paste',function()
	{
		$prenom = $('.prenom').val();
		$regPrenom = /^[a-zA-Z]{2,15}$/;  //entre 1 et 15 caractères sans caractères spéciaux 
		$test2 = $regPrenom.test($prenom);		
		if($prenom=="")
		{
			$("#IconePrenom").addClass("hide");
			$("#IconePrenom").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test2)
		{
			$("#IconePrenom").removeClass("hide");
			$("#IconePrenom").removeClass("has-error");
			$("#IconePrenom").addClass("has-success");
			$("#IconePrenom").children(".erreur").addClass("hide");
			$("#IconePrenom").children(".valide").removeClass("hide");
			$("#IconePrenom").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconePrenom").removeClass("hide");
			$("#IconePrenom").addClass("has-error");
			$("#IconePrenom").removeClass("has-success");
			$("#IconePrenom").children(".erreur").removeClass("hide");
			$("#IconePrenom").children(".valide").addClass("hide");
			$("#IconePrenom").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});


	$(".mdp").on('keyup change paste',function()
	{
		$mdp = $('.mdp').val();
		$regMdp = /^.{5,15}$/;  //le mdp doit contenir au moins 5 caracteres (15max) et peut etre composé de lettre maj et minuscule ainsi que de chiffre et d'underscore ou tiret 
		$test3 = $regMdp.test($mdp);

		if($mdp=="")
		{
			$("#IconeMdp").addClass("hide");
			$("#IconeMdp").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test3)
		{
			$("#IconeMdp").removeClass("hide");
			$("#IconeMdp").removeClass("has-error");
			$("#IconeMdp").addClass("has-success");
			$("#IconeMdp").children(".erreur").addClass("hide");
			$("#IconeMdp").children(".valide").removeClass("hide");
			$("#IconeMdp").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeMdp").removeClass("hide");
			$("#IconeMdp").addClass("has-error");
			$("#IconeMdp").removeClass("has-success");
			$("#IconeMdp").children(".erreur").removeClass("hide");
			$("#IconeMdp").children(".valide").addClass("hide");
			$("#IconeMdp").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});


	$(".verif").on('keyup change paste',function()
	{
		$conf = $('.conf').val();
		$mdp = $('.mdp').val();
		$test4 = ($conf == $mdp);

		if($mdp=="" || $conf=="")
		{
			$("#IconeConf").addClass("hide");
			$("#IconeConf").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test4)
		{
			$("#IconeConf").removeClass("hide");
			$("#IconeConf").removeClass("has-error");
			$("#IconeConf").addClass("has-success");
			$("#IconeConf").children(".erreur").addClass("hide");
			$("#IconeConf").children(".valide").removeClass("hide");
			$("#IconeConf").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeConf").removeClass("hide");
			$("#IconeConf").addClass("has-error");
			$("#IconeConf").removeClass("has-success");
			$("#IconeConf").children(".erreur").removeClass("hide");
			$("#IconeConf").children(".valide").addClass("hide");
			$("#IconeConf").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});

});



function testConfirmation()
	{
		if($test1==false)
		{
			alert("Nom incorrect");
			return false;
		}

		if($test2==false)
		{
			alert("Prenom incorrect");
			return false;
		}

		if($test3==false)
		{
			alert("Le mot de passe doit contenir entre 5 et 15 caractères");
			return false;
		}

		if($test4==false)
		{
			alert("Le mot de passe n'a pas été correctement validé");
			return false;
		}
			
		return true;

	};

