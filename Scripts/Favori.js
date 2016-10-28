$(document).ready(function()
{

	$("button.Favori").click(function()
	{
		$id = $("span.ID_R").text();
		console.log($id);
		window.location.assign("./BDD/Favori_bdd.php?ID_R="+$id);

	});

	$("button.FavoriR").click(function()
	{
		$id = $("span.ID_R").text();
		window.location.assign("./BDD/Favori_bdd.php?ID_R="+$id+"&sup=0");

	});

});
