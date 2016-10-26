$(document).ready(function()
{

	$("button.Promouvoir").click(function()
	{

		$pseudo=$(this).parent("td").parent("tr").children("td").eq(0).text();
		window.location.assign('./Changer_Statut.php?Pseudo='+$pseudo+'&ban=0');

	});

	$("button.Ban").click(function()
	{

		$pseudo=$(this).parent("td").parent("tr").children("td").eq(0).text();
		window.location.assign('./Changer_Statut.php?Pseudo='+$pseudo+'&ban=1');

	});

	$("button.Deban").click(function()
	{

		$pseudo=$(this).parent("td").parent("tr").children("td").eq(0).text();
		window.location.assign('./Changer_Statut.php?Pseudo='+$pseudo+'&ban=2');

	});

		$("button.Supprimer").click(function()
	{

		$pseudo=$(this).parent("td").parent("tr").children("td").eq(0).text();
		window.location.assign('./Changer_Statut.php?Pseudo='+$pseudo+'&ban=3');

	});

});