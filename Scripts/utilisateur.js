$(document).ready(function()
{


	$(".dropdown-toggle").click(function()
	{
		if($(".dropdown-toggle").children("small").children("span").hasClass("glyphicon-triangle-bottom"))
		{
			$(".dropdown-toggle").children("small").children("span").addClass("glyphicon-triangle-top");
			$(".dropdown-toggle").children("small").children("span").removeClass("glyphicon-triangle-bottom");
		}
		else
		{
			$(".dropdown-toggle").children("small").children("span").addClass("glyphicon-triangle-bottom");
			$(".dropdown-toggle").children("small").children("span").removeClass("glyphicon-triangle-top");
		}
	});


});



