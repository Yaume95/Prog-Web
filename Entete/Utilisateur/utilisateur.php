<script src="./Scripts/utilisateur.js"></script>
<link rel="stylesheet" href="./CSS/Styles/Formulaire.css">




<li>
    <a class="dropdown-toggle" data-toggle="dropdown" id="OptionUtilisateur"> 
    	<span class="glyphicon glyphicon-user"></span><?php echo $_SESSION['Prénom'] .' ' . $_SESSION['Nom']; ?>
    	<small><span class="glyphicon glyphicon-triangle-bottom" id="Triangle"></span></small>
    </a>

    <ul class="dropdown-menu">
        <?php
                if($_SESSION['Collaborateur']==1)
                {
                    echo '<li><a href="Ajout_Restaurant.php"><span class="glyphicon glyphicon-plus"></span>  Ajouter un restaurant  </a></li>';
                }
        ?>
        <li><a href="#"><span class="glyphicon glyphicon-star"></span>  Mes favoris  </a></li>
        <li><a href="./Profil.php"><span class="glyphicon glyphicon-edit"></span>  Mon profil  </a></li>
      	<li class="divider"></li>
      	<li><a href="./BDD/deconnection.php"><span class="glyphicon glyphicon-log-out"></span>  Déconnection  </a></li>
    </ul>
</li>