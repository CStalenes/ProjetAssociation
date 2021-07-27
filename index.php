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
            <p>Resize the browser window to see the effect.</p>
        </div>

        <div class="topnav">
            <!--<a href="index.php?page=1"> Les Associations </a>-->
            <a href="index.php?page=0"> Acceuil </a>
            <a href="gestion_association.php?page=1"> Les Associations </a>
            <a href="gestion_enseigne.php?page=2"> Les Enseignes </a>
            <!--<a href="gestion_enseigne2.php?page=3"> Les Enseignes2 </a>-->
            <a href="gestion_demande.php?page=3"> Les Demandes </a>
            <a href="gestion_produit.php?page=4"> Les Produits </a>
            <a href="gestion_offre.php?page=5"> Les Offres </a>
            <a href="inscription.php?page=6"> Inscription </a>

        </div>

        <div class = "asso-img">
            <div class ="asso-text">
                <h1>Soutenez nous faites nous des dons</h1>
                    <h5> Nous somme une organissation de don</h5>
            </div>

        </div>

        <!-- c'est ici ou il faut mettre la ssession avec la div content-->
       

       <!-- <div class = "box">
            <div class ="left-box">
                <div class = "in-box" >
                    <h2> Titre d entete</h2>
                    <h5>Yeeah</h5>
                    <div class="fakeimg" style="height:200px;">Image</div>

                </div>
            </div>
        </div>-->


        <center>

            <!--<h1> Bienvenu sur Les amis des Associations </h1>
            <p>
                Logan
                --<a href = 'index.php?page=1'>
                <img src="img_DonAsso/logo_nogaspillage.png" height="150" width="150"> </a>

                <a href = 'index.php?page=2'>
                <img src="img_DonAsso/logo_entreprise.png" height="150" width="150"> </a>

                <a href = 'index.php?page=3'>
                <img src="img_DonAsso/logo_demande.jpg" height="150" width="150"> </a>
                
                <a href = 'index.php?page=4'>
                <img src="img_DonAsso/logo_offre.jpg" height="150" width="150"> </a>

                <a href = 'index.php?page=5'>
                <img src="img_DonAsso/logo_rdv.jpg" height="150" width="150"> </a>

                <a href = 'index.php?page=6'>
                <img src="img_DonAsso/logo_alimentaire.jpg" height="150" width="150"> </a> -->

            </p>

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


                /*case 6 : require_once("gestion_produit.php"); break;*/

                //default: require_once("index.php"); break;



            }

        ?>

        </center>

        <div class="footer">
            <h2> Footer </h2>
            
            <p>2021 All rights reserved, Association Union, Developped by Stalenes, Diabira, Hermann</p>
        </div>
         


    </body>
</html>