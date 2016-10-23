$(document).ready(function()
{

	$(".NomRestau").click(function()
	{

		$id=$(this).parent("div").children("span").eq(1).text();
		window.location.assign('./Restaurant.php?ID_R='+$id);

	});


});