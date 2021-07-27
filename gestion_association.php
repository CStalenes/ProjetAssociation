<?php
	require_once("fonction.php");
?>


<!--Pour regler les bleme faut mettre ../ dans href et ajouter une page gestion et repéré les eventuelles erreur -->
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css_asso/style.css">
        <link rel="stylesheet" href="css_asso/register.css">


    </head>

    <br/> <br/>

    <?php
        $lAssocia = null;
        if(isset($_GET['idAssocia']) && isset($_GET['action']))
        {
            $action = $_GET['action'];
            $idAssocia = $_GET['idAssocia'];

            $lAssocia = selectWhereAssocia($idAssocia);
        }

    ?>

    <body>

        <div class="header">
            <h1>Les amis des Associations</h1>
            <p>Resize the browser window to see the effect.</p>
        </div>

        <div class="topnav">

            <a href="index.php?page=0"> Acceuil </a>
            <a href="gestion_association.php?page=1"> Les Associations </a>
            <a href="gestion_enseigne.php?page=2"> Les Enseignes </a>
            <!--<a href="gestion_enseigne2.php?page=3"> Les Enseignes2 </a>-->
            <a href="gestion_demande.php?page=3"> Les Demandes </a>
            <a href="gestion_produit.php?page=4"> Les Produits </a>
            <a href="gestion_offre.php?page=5"> Les Offres </a>
            <a href="inscription.php?page=6"> Inscription </a>


        </div>


        <!--
        <div class = "box">


            <div class ="main">

                <h2> Titre d entete bro22</h2>
                <h5>Yeeah</h5>

                <div class="fakeimg" style="height:350px;">Image</div>

                <p>text here</p>
                <p> Lorem ipsum dolor sit</p>    

            </div>
            <br>
            <br>
            <br>

            <div class ="main">

                <h2> Titre d entete bro23</h2>
                <h5>Yeeah</h5>

                <div class="fakeimg" style="height:350px;">Image</div>

                <p>text here</p>
                <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequatur excepturi, magni ipsum assumenda, illum 
                    cupiditate dolore nihil doloremque qui porro, sed veritatis culpa tempore nisi? Quos dolorem saepe 
                    necessitatibus voluptatem!<br>
                </p>
            </div>



            <div class = "side">

                <h2>About Me</h2>
                <h5>Photo de moi  </h5>

                <div class="fakeimg" style="height:300px;">Image</div>

                <p> ppppp </p>
                <h3>More text </h3>
                <p>llaaaaa</p>

            </div>

        </div>
        -->

        <div id = "div-form">
            <form method = "post" action="gestion_association.php" >

                <label for ="nomAssocia"> Nom Association </label>
                <input type = "text" id="nomAssocia" name = "nomAssocia" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['nomAssocia']; ?>" placeholder = "Nom de l'enseigne">

                <label for ="adresseAssocia"> Adresse </label>
                <input type = "text" id="adresseAssocia" name = "adresseAssocia" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['adresseAssocia']; ?>" placeholder = "Adressse de l'association">

                <label for ="emailAssocia"> Email </label>
                <input type = "text" id="emailAssocia" name = "emailAssocia" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['emailAssocia']; ?>" placeholder = "Email de l'association">

                <label for ="telAssocia"> Telephone </label>
                <input type = "text" id="telAssocia" name = "telAssocia" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['telAssocia']; ?>" placeholder = "Telphone de l'association">

                <label for ="descriptionAssocia"> Description </label>
                <input type = "text" id="descriptionAssocia" name = "descriptionAssocia" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['descriptionAssocia']; ?>" placeholder = "Description l'association">


                <label for ="dateIncription"> Date Inscription </label>
                <input type = "text" id="dateIncription" name = "dateIncription" 
                value = "<?php if($lAssocia!=null) echo $lAssocia['dateIncription']; ?>" placeholder = "Date Incription">

                <input type = "submit"
                    <?php
                    if($lAssocia != null) echo " name ='Modifier' value = 'Modifier'";
                        else echo "name = 'Valider' value ='Valider'";
                    ?>
                >

                <input type = "reset" name = "Annuler" value ="Annuler"> 


                <?php
                    if($lAssocia != null) echo "<input type = 'hidden' name = 'idAssocia' value = '".$lAssocia['idAssocia']."'>";
                ?>

            </form>

        </div>


            


        
        <?php
            if (isset($_POST["Valider"]))
            {
                insertAssocia($_POST);
                echo "<br/> Insertion réussi de la new associa";
            }

            if(isset($_POST["Modifier"]))
            {
                updateAssocia($_POST);
                header("Location: index.php?page=1");
            }

            if(isset($_GET['idAssocia']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idAssocia = $_GET['idAssocia'];
                if($action == "sup")
                {
                    deleteAssocia($idAssocia);
                }
            }
        ?>

        
        
        <br/> <br/>
        <h2> Liste des Associations </h2>

        <form method = "post" action = "">
            Mot de recherche :<input type = "text" name ="mot">
            <input type = "submit" name = "ok" value = "Filtrer">
        </form>

        <?php 
            if (isset($_POST["ok"]))
            {
                $mot = $_POST['mot'];
                $resultats = selectAssocia($mot);
            }
            else
            {
                $resultats = selectAssocia();
            }
        ?>

        <table border ="1">
            <tr>
                <td> ID Associa </td> <td> Nom Associa </td> <td> Adresse Associa </td>
                <td> Email Associa </td> <td> Telephone Associa </td> <td> Description </td> <td>Operation</td>
            </tr>

            <?php
                
                foreach ($resultats as $uneAssocia)
                {
                        echo"<tr>
                                <td>".$uneAssocia['idAssocia']."</td>
                                <td>".$uneAssocia['nomAssocia']."</td>
                                <td>".$uneAssocia['adresseAssocia']."</td>
                                <td>".$uneAssocia['emailAssocia']."</td>
                                <td>".$uneAssocia['telAssocia']."</td>
                                <td>".$uneAssocia['descriptionAssocia']."</td>
                                <td>
                                    <a href = 'index.php?page=1&action=sup&idAssocia=".$uneAssocia['idAssocia']."'>
                                    <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                                    <a href = 'index.php?page=1&action=edit&idAssocia=".$uneAssocia['idAssocia']."'>
                                    <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                                </td>
                            </tr>";
                    
                }
            ?>

        </table>

        <div class="footer">
            <h2> Footer </h2>
            <p>2021 All rights reserved, Association Union, Developped by Stalenes, Diabira, Hermann</p>
        </div>

    </body>

</html>