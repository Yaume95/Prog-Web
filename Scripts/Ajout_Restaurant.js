$(document).ready(function()
{	


	$(".nomR").on('keyup change paste',function()
	{
		$nom = $('.nomR').val();
		$regNom = /^[ a-zA-Z]{2,30}$/;  //entre 2 et 30 caractères sans caractères spéciaux
		$test1 = $regNom.test($nom);
		
		if($nom=="")
		{

			$("#IconeNomR").addClass("hide");
			$("#IconeNomR").removeClass("has-error");
			$("#IconeNomR").removeClass("has-success");

			$("#IconeNomR").children(".error").addClass("hide");
			$("#IconeNomR").children(".valide").addClass("hide");

			$("#IconeNomR").parent("div").parent("div").children("div.has-error").addClass("hide");

		}

		else if($test1)
		{
			$("#IconeNomR").removeClass("hide");
			$("#IconeNomR").removeClass("has-error");
			$("#IconeNomR").addClass("has-success");
			$("#IconeNomR").children(".erreur").addClass("hide");
			$("#IconeNomR").children(".valide").removeClass("hide");
			$("#IconeNomR").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeNomR").removeClass("hide");
			$("#IconeNomR").addClass("has-error");
			$("#IconeNomR").removeClass("has-success");
			$("#IconeNomR").children(".erreur").removeClass("hide");
			$("#IconeNomR").children(".valide").addClass("hide");
			$("#IconeNomR").parent("div").parent("div").children("div.has-error").removeClass("hide");

		}

	});





	$(".adresseR").on('keyup change paste',function()
	{
		$adresse = $('.adresseR').val();
		$regAdresse = /^[0-9]{1,5}[ a-zA-Z]{1}[ a-zA-Z]+$/;  //doit commencer par des chiffres suivie de lettre
		$test2 = $regAdresse.test($adresse);		
		
		if($adresse=="")
		{
			$("#IconeAdresse").addClass("hide");
			$("#IconeAdresse").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test2)
		{
			$("#IconeAdresse").removeClass("hide");
			$("#IconeAdresse").removeClass("has-error");
			$("#IconeAdresse").addClass("has-success");
			$("#IconeAdresse").children(".erreur").addClass("hide");
			$("#IconeAdresse").children(".valide").removeClass("hide");
			$("#IconeAdresse").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeAdresse").removeClass("hide");
			$("#IconeAdresse").addClass("has-error");
			$("#IconeAdresse").removeClass("has-success");
			$("#IconeAdresse").children(".erreur").removeClass("hide");
			$("#IconeAdresse").children(".valide").addClass("hide");
			$("#IconeAdresse").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});



	$(".telR").on('keyup change paste',function()
	{
		$tel = $('.telR').val();
		$regTel = /^[0-9]{10}$/;  //doit contenir 10 chiffres
		$test3 = $regTel.test($tel);		
		
		if($tel=="")
		{
			$("#IconeTel").addClass("hide");
			$("#IconeTel").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test3)
		{
			$("#IconeTel").removeClass("hide");
			$("#IconeTel").removeClass("has-error");
			$("#IconeTel").addClass("has-success");
			$("#IconeTel").children(".erreur").addClass("hide");
			$("#IconeTel").children(".valide").removeClass("hide");
			$("#IconeTel").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeTel").removeClass("hide");
			$("#IconeTel").addClass("has-error");
			$("#IconeTel").removeClass("has-success");
			$("#IconeTel").children(".erreur").removeClass("hide");
			$("#IconeTel").children(".valide").addClass("hide");
			$("#IconeTel").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});




	$(".capaciteR").on('keyup change paste',function()
	{
		$capacite = $('.capaciteR').val();
		$test4 = $capacite >= 0;		
		
		if($capacite=="")
		{
			$("#IconeCapacite").addClass("hide");
			$("#IconeCapacite").parent("div").parent("div").children("div.has-error").addClass("hide");
		}	
		else if($test4)
		{
			$("#IconeCapacite").removeClass("hide");
			$("#IconeCapacite").removeClass("has-error");
			$("#IconeCapacite").addClass("has-success");
			$("#IconeCapacite").children(".erreur").addClass("hide");
			$("#IconeCapacite").children(".valide").removeClass("hide");
			$("#IconeCapacite").parent("div").parent("div").children("div.has-error").addClass("hide");

		}
		else
		{
			$("#IconeCapacite").removeClass("hide");
			$("#IconeCapacite").addClass("has-error");
			$("#IconeCapacite").removeClass("has-success");
			$("#IconeCapacite").children(".erreur").removeClass("hide");
			$("#IconeCapacite").children(".valide").addClass("hide");
			$("#IconeCapacite").parent("div").parent("div").children("div.has-error").removeClass("hide");
		}	
	});

});