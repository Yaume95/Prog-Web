$(document).ready(function()
{

    $(".supC").click(function()
    {

        $idR=$(this).children("span.ID_R").eq(0).text();
        $id=$(this).children("span.ID_C").eq(0).text();
        window.location.assign('./BDD/SupprCommentaire.php?ID_C='+$id+'&ID_R='+$idR);

    });

});