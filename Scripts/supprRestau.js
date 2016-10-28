$(document).ready(function()
{

    $(".supR").click(function()
    {

        $idR=$(this).parent('div').parent('div').children("span").eq(0).text();
        console.log($idR);
        window.location.assign('./BDD/SupprRestaurant.php?ID_R='+$idR);

    });

});