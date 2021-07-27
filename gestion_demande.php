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
        <h2> Gestion des Demandes </h2>
        <?php
            $laDemande = null;
            if(isset($_GET['idDemande']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idDemande = $_GET['idDemande'];

                $laDemande = selectWhereDemande($idDemande);
            }
        ?>


        <div id = "div-form">
            <form method = "post" action="gestion_demande.php" >

                <label for ="idAssocia">ID Association </label>
                <!--<input type = "text" id="idAssocia" name = "idAssocia" placeholder = "ID de l'association"> -->
                <select id = "idAssocia" name = "idAssocia" placeholder = "Association correspondant à L'ID">
                    <?php
                        $lesAssociations = selectAssocia();
                        foreach ($lesAssociations as $uneAssocia) {
                            echo "<option value='".$uneAssocia['idAssocia']."'>".$uneAssocia['nomAssocia']."</option>";
                            /*echo "<option value='".$uneAssocia['idAssocia']."'>".$uneAssocia['idAssocia']."</option>";*/
                        }
                    ?>  
                </select>


                <label for ="idEns"> ID Enseigne </label>
                <!--<input type = "text" id="idAssocia" name = "idAssocia" placeholder = "ID de l'association"> -->
                <select id = "idEns" name = "idEns" placeholder = "ID de l'enseigne">
                    <?php
                        $lesEnseignes = selectEns();
                        foreach ($lesEnseignes as $uneEns) {
                            echo "<option value='".$uneEns['idEns']."'>".$uneEns['nomEns']."</option>";
                        }
                    ?>  
                </select>

                <label for ="motifDemande"> Motif </label>
                <input type = "text" id="motifDemande" name = "motifDemande" 
                value = "<?php if($laDemande!=null) echo $laDemande['motifDemande']; ?>" placeholder = "Donner le Motif">


                <label for ="dateDemande"> Date Demande </label>
                <input type = "text" id="dateDemande" name = "dateDemande" 
                value = "<?php if($laDemande!=null) echo $laDemande['dateDemande']; ?>" placeholder = "Donner la date">


            
                <input type = "submit"
                    <?php
                        if($laDemande != null) echo " name ='Modifier' value = 'Modifier'";
                            else echo "name = 'Valider' value ='Valider'";
                    ?>
                >

                <input type = "reset" name = "Annuler" value ="Annuler"> 


                <?php
                    if($laDemande != null) echo "<input type = 'hidden' name = 'idDemande' value = '".$laDemande['idDemande']."'>";
                    //en gros le type hidden pour idDemande de ce input permettra de valider (entrer) l'idDemande 
                    //qui est mentionne dans tout les balises des input du formulaire
                    //faut le voir comme une condition en lien avec la bdd pour effectuer une action dans le formulairre 
                ?>

            </form>

        </div>


        <?php
            if (isset($_POST["Valider"]))
            {
                insertDemande($_POST);
                echo "<br/> Insertion réussi de la new demande";
            }

            if(isset($_POST["Modifier"]))
            {
                updateDemande($_POST);
                header("Location: index.php?page=3");
            }

            if(isset($_GET['idDemande']) && isset($_GET['action']))
            {
                $action = $_GET['action'];
                $idDemande = $_GET['idDemande'];
                if($action == "sup")
                {
                    deleteDemande($idDemande);
                }
            }
        ?>

        <br/> <br/>
        <h2> Liste des Demandes </h2>

        <form method = "post" action = "">
            Mot de recherche :<input type = "text" name ="mot">
            <input type = "submit" name = "ok" value = "Filtrer">
        </form>

        <?php 
            if (isset($_POST["ok"]))
            {
                $mot = $_POST['mot'];
                $resultats = selectAllDemandes($mot);
            }
            else
            {
                $resultats = selectAllDemandes();
            }
        ?>

        <table border ="1">
            <tr>
                <td> ID Demande </td> <td> Nom Association  </td> <td> Nom Enseigne </td>
                <td> Motif </td> <td> Date Demande </td> <td> Operation</td>
            </tr>

            <?php
                
                foreach ($resultats as $uneDemande)
                {
                        echo"<tr>
                                <td>".$uneDemande['idDemande']."</td>
                                <td>".$uneDemande['nomAssocia']."</td>
                                <td>".$uneDemande['nomEns']."</td>
                                <td>".$uneDemande['motifDemande']."</td>
                                <td>".$uneDemande['dateDemande']."</td>                        
                                <td>
                                    <a href = 'index.php?page=3&action=sup&idDemande=".$uneDemande['idDemande']."'>
                                    <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                                    <a href = 'index.php?page=3&action=edit&idDemande=".$uneDemande['idDemande']."'>
                                    <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                                </td>
                            </tr>";
                    
                }
            ?>

        </table>
    </body>

</html>