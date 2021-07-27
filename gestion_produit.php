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
        <h2> Gestion des Produits </h2>
        <?php
            $leProduit = null;
            if(isset($_GET['idProd']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idProd = $_GET['idProd'];

                $leProduit = selectWhereProd($idProd);
            }

        ?>

        <div id = "div-form">
            <form method = "post" action="gestion_produit.php" >

                <label for ="nomProd"> Nom Produit </label>
                <input type = "text" id="nomProd" name = "nomProd" 
                value = "<?php if($leProduit!=null) echo $leProduit['nomProd']; ?>" placeholder = "Nom de Produit">

                <label for ="categorie"> Categorie </label>
                <input type = "text" id="categorie" name = "categorie" 
                value = "<?php if($leProduit!=null) echo $leProduit['categorie']; ?>" placeholder = "Categorie du Produit">

                <label for ="datePeremption"> Date de Peremption </label>
                <input type = "text" id="datePeremption" name = "datePeremption" 
                value = "<?php if($leProduit!=null) echo $leProduit['datePeremption']; ?>" placeholder = "Date de peremption">

                <label for ="quantiteProd"> Quantite </label>
                <input type = "text" id="quantiteProd" name = "quantiteProd" 
                value = "<?php if($leProduit!=null) echo $leProduit['quantiteProd']; ?>" placeholder = "Quantite de produit">

                <label for ="marqueProd"> Marque </label>
                <input type = "text" id="marqueProd" name = "marqueProd" 
                value = "<?php if($leProduit!=null) echo $leProduit['marqueProd']; ?>" placeholder = "Marque du Produit">


                <label for ="origineProd"> Enseigne/Particulier </label>
                <input type = "text" id="origineProd" name = "origineProd" 
                value = "<?php if($leProduit!=null) echo $leProduit['origineProd']; ?>" placeholder = "La provenance">

                <input type = "submit"
                    <?php
                        if($leProduit != null) echo " name ='Modifier' value = 'Modifier'";
                            else echo "name = 'Valider' value ='Valider'";
                    ?>
                >

                <input type = "reset" name = "Annuler" value ="Annuler"> 


                <?php
                    if($leProduit != null) echo "<input type = 'hidden' name = 'idProd' value = '".$leProduit['idProd']."'>";
                ?>

            </form>

        </div>



        <?php
            if (isset($_POST["Valider"]))
            {
                insertProduit($_POST);
                echo "<br/> Insertion réussi du new produit";
            }

            if(isset($_POST["Modifier"]))
            {
                updateProd($_POST);
                header("Location: index.php?page=4");
            }

            if(isset($_GET['idProd']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idProd = $_GET['idProd'];
                if($action == "sup")
                {
                    deleteProd($idProd);
                }
            }
        ?>

        <br/> <br/>
        <h2> Liste des Produits </h2>

        <form method = "post" action = "">
            Mot de recherche :<input type = "text" name ="mot">
            <input type = "submit" name = "ok" value = "Filtrer">
        </form>

        <?php 
            if (isset($_POST["ok"]))
            {
                $mot = $_POST['mot'];
                $resultats = selectAllProduits($mot);
            }
            else
            {
                $resultats = selectAllProduits();
            }
        ?>

        <table border ="1">
            <tr>
                <td> ID Produit </td> <td> Nom Produit </td> <td> Categorie </td>
                <td> Date Peremption </td> <td> Quantite </td> <td> Marque </td> <td>Operation</td>
            </tr>

            <?php
                
                foreach ($resultats as $unProd)
                {
                        echo"<tr>
                                <td>".$unProd['idProd']."</td>
                                <td>".$unProd['nomProd']."</td>
                                <td>".$unProd['categorie']."</td>
                                <td>".$unProd['datePeremption']."</td>
                                <td>".$unProd['quantiteProd']."</td>
                                <td>".$unProd['marqueProd']."</td>
                                <td>
                                    <a href = 'index.php?page=4&action=sup&idProd=".$unProd['idProd']."'>
                                    <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                                    <a href = 'index.php?page=4&action=edit&idProd=".$unProd['idProd']."'>
                                    <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                                </td>
                            </tr>";
                    
                }
            ?>

        </table>


    </body>
</html>