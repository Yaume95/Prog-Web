$(document).ready(function()
{

    $(".NomRestau").click(function()
    {

        $id=$(this).parent("td").children("span").eq(0).text();
        window.location.assign('./Restaurant.php?ID_R='+$id);

    });


      $(".SupprimerFav").click(function()
    {

        $id=$(this).parent("td").parent("tr").children("td").eq(0).children("span").eq(0).text();
        window.location.assign('./BDD/SupprimerFav_bdd.php?ID_R='+$id);

    });


});