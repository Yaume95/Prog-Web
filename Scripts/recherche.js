$(document).ready(function()
{

    $(".NomRestau").click(function()
    {

        $id=$(this).parent("div").children("span").eq(0).text();
        window.location.assign('./Restaurant.php?ID_R='+$id);

    });


});