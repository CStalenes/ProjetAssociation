<?php
	require_once("fonction.php");
?>

<!DOCTYPE html>

    <head>
    
        <title> Page Acceuil </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css_asso/style.css">
        <link rel="stylesheet" href="css_asso/register.css">


    </head>

    <body>

        <div class="header">
            <h1>Les amis des Associations</h1>
        </div>

        <div class="topnav">
            <a href="index.php?page=0"> Acceuil </a>
            <a href="gestion_association.php?page=1"> Les Associations </a>
            <a href="gestion_enseigne.php?page=2"> Les Enseignes </a>
            <a href="gestion_demande.php?page=3"> Les Demandes </a>
            <a href="gestion_produit.php?page=4"> Les Produits </a>
            <a href="gestion_offre.php?page=5"> Les Offres </a>
            <a href="inscription.php?page=6"> Inscription </a>
        </div>

        <!--<div class = "asso-img">
            <div class ="asso-text">
                <h1>Soutenez nous faites nous des dons</h1>
            </div>

        </div>-->

        <div class = "content">
            <?php if (isset($_SESSION['success'])) :?>
                <div class ="error-success">
                    <h3>
                        <?php
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                        ?>
                    </h3>
                </div>
            <?php endif ?>

            <?php if(isset($_SESSION['nomUtilisateur'])): ?>
                <p> Bienvenu <strong> <?php echo $_SESSION['nomUtilisateur']; ?></strong></p>
                <p><a href ="" style = "color:red"> Deconnection </a></p>
            <?php endif  ?>

        </div>


        <!-- div pour le log  -->

        <?php
            if (isset($_GET['page']))
            {
                $page = $_GET['page'];
            }

            else
            {
                $page = 0;
            }
            
            switch($page)
            {
                case 1 : require_once("gestion_association.php"); break;

                case 2 : require_once("gestion_enseigne.php"); break;

                //case 3 : require_once("gestion_enseigne2.php"); break;

                case 3 : require_once("gestion_demande.php"); break;

                case 4 : require_once("gestion_produit.php"); break;

                case 5 : require_once("gestion_offre.php"); break;

                case 6 : require_once("inscription.php"); break;
            }
        ?>


        <div class="footer">
            <h2> Footer </h2>
            
            <p>2021 All rights reserved, Association Union, Developped by Stalenes, Diabira, Hermann</p>
        </div>
         


    </body>
</html>