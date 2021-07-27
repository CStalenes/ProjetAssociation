<br/> <br/>
<h2> Gestion des RDV </h2>


<?php
    $leRDV = null;
    if(isset($_GET['idRDV']) && isset($_GET['action']))
    {
        $action = $_GET['action'];
        $idRDV = $_GET['idRDV'];

        //extrait le client de id de url
        $leRDV = selectWhereRDV($idRDV);
    }

?>

<br/> <br/>
<h2> Enseigne pour fixer le RDV </h2>

<form method = "post" action = "">
    <table border = "0">
        
        <tr>
            <td> L Enseigne : </td> <td> <input type="text" name ="idEns" 
                value= "<?php if($leRDV!=null) echo $leRDV['idEns']; ?>">  </td>
        </tr>

        <tr>
            <td> L Association : </td> <td> <input type="text" name ="idAssocia"
                value= "<?php if($leRDV!=null) echo $leRDV['idAssocia']; ?>">  </td>
        </tr>


        <tr>
            <td> Date RDV : </td> <td> <input type="text" name ="dateRDV"
                value= "<?php if($leRDV!=null) echo $leRDV['dateRDV']; ?>"> </td>
        </tr> 

        <tr>
            <td> Heure RDV : </td> <td> <input type="text" name ="heureRDV"
                value= "<?php if($leRDV!=null) echo $leRDV['heureRDV']; ?>"> </td>
        </tr>

        <tr>
            <td> Adresse RDV : </td> <td> <input type="text" name ="adresseRDV"
                value= "<?php if($leRDV!=null) echo $leRDV['adresseRDV']; ?>"> </td>
        </tr>
    

        <tr>
            <td>
                <input type = "reset" name = "Annuler" value ="Annuler"> 
            </td>

            <td>
                <input type = "submit"
                <?php
                    if($leRDV != null) echo " name ='Modifier' value = 'Modifier'>";
                        else echo "name = 'Valider' value ='Valider' >";
                ?> 
            </td>
        </tr>

        <?php
            if($leRDV != null) echo "<input type = 'hidden' name = 'idRDV' value = '".$leRDV['idRDV']."'>";
        ?>
    </table>
</form>


<?php
    if (isset($_POST["Valider"]))
    {
        insertRDV($_POST);
        echo "<br/> Insertion réussi du rdv";
    }

    if(isset($_POST["Modifier"]))
    {
        updateRDV($_POST);
        //echo "<br/> Modification réussie du client";
        header("Location: index.php?page=5");
    }

    if(isset($_GET['idRDV']) && isset($_GET['action']))
    {
        $action = $_GET['action'];
        $idRDV = $_GET['idRDV'];
        if($action == "sup")
        {
            deleteRDV($idRDV);
        }
    }
?>

<br/> <br/>
<h2> Liste des RDV </h2>

<form method = "post" action = "">
    Mot de recherche :<input type = "text" name ="mot">
    <input type = "submit" name = "ok" value = "Filtrer">
</form>

<?php 
    if (isset($_POST["ok"]))
	{
		$mot = $_POST['mot'];
		$resultats = selectAllRDV($mot);
	}
	else
	{
		$resultats = selectAllRDV();
	}
?>

<table border ="1">
    <tr>
        <td> ID RDV </td>  <td> L Enseigne </td> <td> L Association </td>  <td> Date RDV </td> <td> Heure RDV</td>  <td>Operation</td>
    </tr>

    <?php
        //$resultats = selectAllRDV();
        //pourquoi erreur ligne 134 avec nbKM Résoudre
        
        foreach ($resultats as $unRDV)
        {
            echo "<tr>
                        <td>".$unRDV['idRDV']."</td>
                        <td>".$unRDV['nomEns']."</td>
                        <td>".$unRDV['nomAssocia']."</td>
                        <td>".$unRDV['dateRDV']."</td>
                        <td>".$unRDV['heureRDV']."</td>
                        <td>
                            <a href = 'index.php?page=5&action=sup&idRDV=".$unRDV['idRDV']."'>
                            <img src='img_DonAsso/sup.png' height='30' width='30'> </a>

                            <a href = 'index.php?page=5&action=edit&idRDV=".$unRDV['idRDV']."'>
                            <img src='img_DonAsso/edit.jpg' height='30' width='30'> </a>
                            
                        </td>
                </tr>";
             
        }
    ?>

</table>