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
        <h2> Gestion des Offres </h2>
        <?php
            $lOffre = null;
            if(isset($_GET['idOffre']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idOffre = $_GET['idOffre'];

                //extrait le client de id de url
                $lOffre = selectWhereOffre($idOffre);
            }

        ?>

        <div id = "div-form">
            <form method = "post" action="gestion_offre.php" >

                <label for ="typeOffre"> typeOffre </label>
                <input type = "text" id="typeOffre" name = "typeOffre" 
                value = "<?php if($lOffre!=null) echo $lOffre['typeOffre']; ?>" placeholder = "Le type d'Offre">


                <label for ="dateOffre"> Date Offre </label>
                <input type = "text" id="dateOffre" name = "dateOffre" 
                value = "<?php if($lOffre!=null) echo $lOffre['dateOffre']; ?>" placeholder = "Donner la date d'Offre">


                <label for ="idProd">ID Produit </label>
                <select id = "idProd" name = "idProd" placeholder = "Produit correspondant à L'ID">
                    <?php
                        $lesProduits = selectAllProduits();
                        foreach ($lesProduits as $unProd) {
                            echo "<option value='".$unProd['idProd']."'> ".$unProd['quantiteProd']." pack de ".$unProd['nomProd']."</option>";
                        }
                    ?>  
                </select>


                <label for ="idEns"> ID Enseigne </label>
                <select id = "idEns" name = "idEns" placeholder = "ID de l'enseigne">
                    <?php
                        $lesEnseignes = selectEns();
                        foreach ($lesEnseignes as $uneEns) {
                            echo "<option value='".$uneEns['idEns']."'>".$uneEns['nomEns']."</option>";
                        }
                    ?>  
                </select>
                        
                <input type = "submit"
                    <?php
                        if($lOffre != null) echo " name ='Modifier' value = 'Modifier'";
                            else echo "name = 'Valider' value ='Valider'";
                    ?>
                >

                <input type = "reset" name = "Annuler" value ="Annuler"> 


                <?php
                    if($lOffre != null) echo "<input type = 'hidden' name = 'idOffre' value = '".$lOffre['idOffre']."'>";
                   
                ?>

            </form>

        </div>


        <?php
            if (isset($_POST["Valider"]))
            {
                insertOffre($_POST);
                echo "<br/> Insertion réussi de la nouvelle voiture";
            }

            if(isset($_POST["Modifier"]))
            {
                updateOffre($_POST);
                //echo "<br/> Modification réussie du client";
                header("Location: index.php?page=4");
            }

            if(isset($_GET['idOffre']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idOffre = $_GET['idOffre'];
                if($action == "sup")
                {
                    deleteOffre($idOffre);
                }
            }
        ?>

        <br/> <br/>
        <h2> Liste des Offres </h2>

        <form method = "post" action = "">
            Mot de recherche :<input type = "text" name ="mot">
            <input type = "submit" name = "ok" value = "Filtrer">
        </form>

        <?php 
            if (isset($_POST["ok"]))
            {
                $mot = $_POST['mot'];
                $resultats = selectAllOffres($mot);
            }
            else
            {
                $resultats = selectAllOffres();
            }
        ?>

        <table border ="1">
            <tr>
                <td> ID Offre </td> <td> Type Offre </td> <td> Date Offre </td>
                <td> Le Produit </td> <td> L Enseigne </td> <td>Operation</td>
            </tr>

            <?php
                //$resultats = selectAllClients();
                //pourquoi erreur ligne 134 avec nbKM Résoudre
                
                foreach ($resultats as $uneOffre)
                {
                    echo "<tr>
                                <td>".$uneOffre['idOffre']."</td>
                                <td>".$uneOffre['typeOffre']."</td>
                                <td>".$uneOffre['dateOffre']."</td>
                                <td>".$uneOffre['nomProd']. " ".$uneOffre['quantiteProd']."</td>
                                <td>".$uneOffre['nomEns']. "</td>
                                <td>
                                    <a href = 'index.php?page=4&action=sup&idOffre=".$uneOffre['idOffre']."'>
                                    <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                                    <a href = 'index.php?page=4&action=edit&idOffre=".$uneOffre['idOffre']."'>
                                    <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                                </td>
                        </tr>";
                    
                }
            ?>

        </table>

    </body>

</html>