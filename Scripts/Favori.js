$(document).ready(function()
{

	$("button.Favori").click(function()
	{
		$id = $("span.hide").text();
		window.location.assign("./BDD/Favori_bdd.php?ID_R="+$id);

	});

	$("button.FavoriR").click(function()
	{
		$id = $("span.hide").text();
		window.location.assign("./BDD/Favori_bdd.php?ID_R="+$id+"&sup=0");

	});

});
