<?php
    require_once("fonction.php");
?>
<!DOCTYPE html>
<html>


    <head>

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
            <!--<a href="gestion_enseigne2.php?page=3"> Les Enseignes222 </a>-->
            <a href="gestion_demande.php?page=3"> Les Demandes </a>
            <a href="gestion_produit.php?page=4"> Les Produits </a>
            <a href="gestion_offre.php?page=5"> Les Offres </a>
            <a href="inscription.php?page=6"> Inscription </a>






        </div>

        <br/> <br/>
        <h2> Gestion des Enseignes </h2>
        <?php
            $lEnseigne = null;
            if(isset($_GET['idEns']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idEns = $_GET['idEns'];

                $lEnseigne = selectWhereEns($idEns);
            }

        ?>


        <div id = "div-form">
            <form method = "post" action="gestion_enseigne2.php" >

                <label for ="nomEns"> Nom Enseigne </label>
                <input type = "text" id="nomEns" name = "nomEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['nomEns']; ?>" placeholder = "Nom de l'enseigne">

                <label for ="adresseEns"> Adresse </label>
                <input type = "text" id="adresseEns" name = "adresseEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['adresseEns']; ?>" placeholder = "Adressse de l'enseigne">

                <label for ="emailEns"> Email </label>
                <input type = "text" id="emailEns" name = "emailEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['emailEns']; ?>" placeholder = "Email de l'enseigne">

                <label for ="telephoneEns"> Telephone </label>
                <input type = "text" id="telephoneEns" name = "telephoneEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['telephoneEns']; ?>" placeholder = "Telphone de l'enseigne">

                <label for ="descriptionEns"> Description </label>
                <input type = "text" id="descriptionEns" name = "descriptionEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['descriptionEns']; ?>" placeholder = "Description l'enseigne">


                <label for ="dateIncriptionEns"> Date Inscription </label>
                <input type = "text" id="dateIncriptionEns" name = "dateIncriptionEns" 
                value = "<?php if($lEnseigne!=null) echo $lEnseigne['dateIncriptionEns']; ?>" placeholder = "Date Incription">

                <input type = "submit"
                    <?php
                    if($lEnseigne != null) echo " name ='Modifier' value = 'Modifier'";
                        else echo "name = 'Valider' value ='Valider'";
                    ?>
                >

                <input type = "reset" name = "Annuler" value ="Annuler"> 


                <?php
                    if($lEnseigne != null) echo "<input type = 'hidden' name = 'idEns' value = '".$lEnseigne['idEns']."'>";
                ?>

            </form>

        </div>


        <?php
            if (isset($_POST["Valider"]))
            {
                insertEns($_POST);
                echo "<br/> Insertion réussi de la new enseigne";
            }

            if(isset($_POST["Modifier"]))
            {
                updateEns($_POST);
                header("Location: index.php?page=2");
            }

            if(isset($_GET['idEns']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idEns = $_GET['idEns'];
                if($action == "sup")
                {
                    deleteEns($idEns);
                }
            }
        ?>

        <br/> <br/>
        <h2> Liste des Enseignes </h2>

        <form method = "post" action = "">
            Mot de recherche :<input type = "text" name ="mot">
            <input type = "submit" name = "ok" value = "Filtrer">
        </form>

        <?php 
            if (isset($_POST["ok"]))
            {
                $mot = $_POST['mot'];
                $resultats = selectEns($mot);
            }
            else
            {
                $resultats = selectEns();
            }
        ?>

        <table border ="1">
            <tr>
                <td> ID Ens </td> <td> Nom Ens </td> <td> Adresse Ens </td>
                <td> Email Ens </td> <td> Telephone Ens </td> <td> Description </td> <td>Operation</td>
            </tr>

            <?php
                
                foreach ($resultats as $uneEns)
                {
                        echo"<tr>
                                <td>".$uneEns['idEns']."</td>
                                <td>".$uneEns['nomEns']."</td>
                                <td>".$uneEns['adresseEns']."</td>
                                <td>".$uneEns['emailEns']."</td>
                                <td>".$uneEns['telephoneEns']."</td>
                                <td>".$uneEns['descriptionEns']."</td>
                                <td>
                                    <a href = 'index.php?page=2&action=sup&idEns=".$uneEns['idEns']."'>
                                    <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                                    <a href = 'index.php?page=2&action=edit&idEns=".$uneEns['idEns']."'>
                                    <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                                </td>
                            </tr>";
                    
                }
            ?>

        </table>
    </body>
</html>