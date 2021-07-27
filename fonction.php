<?php
    function connexion(){
        $connect = mysqli_connect("localhost", "root", "", "DonAssociation3");

        if ( !$connect)
        {
            echo "Erreur de connexion à la base de donnee";
            exit;
        }

        return $connect;

    }

    function deconnexion($connect)
    {
        mysqli_close($connect);
    }
?>


<?php
/********************************Association*********************** */

    function insertAssocia($tab)
    {
        $requete =" insert into Association values (null, '".$tab['nomAssocia']."', '".$tab['adresseAssocia']
        ."', '".$tab['emailAssocia']."', '".$tab['telAssocia']."', '".$tab['descriptionAssocia']."', '".$tab['dateInscription']."');" ; 
        echo $requete;
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php
    function selectAssocia($mot ="")
    {
        if( $mot == "")
        {
            $requete = "select * from Association ;";
        }
        
        else
        {
            $requete = "select * from Association where nomAssocia like '%'.$mot.'%' or 
            adresseAssocia like '%".$mot."%' or emailAssocia like '%".$mot."%' 
            or telAssocia '%".$mot."'";             
        }


        $connect   = connexion();
        $resultats = mysqli_query($connect, $requete);

        $tab = array();

        while ($ligne = mysqli_fetch_assoc($resultats))
        {
            $tab[] = $ligne;
        }

        deconnexion($connect);
        return $tab;
    }
?>

<?php
    function deleteAssocia($idAssocia)
    {
        $requete =" delete from Association where idAssocia = ".$idAssocia.";";
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php

    function updateAssocia($tab)
    {
        $requete ="update Association set nomAssocia = '".$tab['nomAssocia']."', adresseAssocia = '".$tab['adresseAssocia']."
        ', emailAssocia = '".$tab['emailAsocia']."', telAssocia = '".$tab['telAssocia']."', descriptionAssocia = '".$tab
        ['descriptionAssocia']."', dateInscription = '".$tab['dateInscription']."'  where idAssocia = ".$tab['idAssocia'].";" ; 
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php
    function selectWhereAssocia($idAssocia)
    {
      
        $requete = "select * from Association where idAssocia = ".$idAssocia.";";
        $connect = connexion ();
        $resultats = mysqli_query($connect, $requete);

        $ligne = mysqli_fetch_assoc($resultats);
        deconnexion($connect);
        return $ligne;
    }
?>

<?php
/**********************************Enseigne********************************** */



    function insertEns($tab)
        {
            $requete =" insert into Enseigne values (null, '".$tab['nomEns']."', '".$tab['adresseEns']
            ."', '".$tab['emailEns']."', '".$tab['telephoneEns']."', '".$tab['descriptionEns']."', '".$tab['dateInscription']."');" ; 
            echo $requete;
            
            $connect = connexion ();
            mysqli_query($connect, $requete);
            deconnexion($connect);
        }
?>

<?php
    function selectEns($mot ="")
    {
        if( $mot == "")
        {
            $requete   = "select * from Enseigne ;";
        }
        else
        {
            $requete   = "select * from Enseigne where nomEns like '%'.$mot.'%' or 
                adresseEns like '".$mot."%' or emailEns like '%".$mot."%' 
                or telephoneEns '%".$mot."'";             
        }


        $connect   = connexion();
        $resultats = mysqli_query($connect, $requete);

        $tab = array();
        while ($ligne = mysqli_fetch_assoc($resultats))
        {
            $tab[] = $ligne;
        }

        deconnexion($connect);
        return $tab;
    }
?>

<?php

    function deleteEns($idEns)
    {
        $requete =" delete from Enseigne where idEns = ".$idEns.";";
        
        
        $connect = connexion ();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php

    function updateEns($tab)
    {
        $requete ="update Enseigne set nomEns = '".$tab['nomEns']."', adresseEns = '".$tab['adresseEns']."
        ', emailEns = '".$tab['emailEns']."', telephoneEns = '".$tab['telephoneEns']."', descriptionEns = '".$tab
        ['descriptionEns']."', dateInscription = '".$tab['dateInscription']."'  where idEns = ".$tab['idEns'].";" ; 
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php
    function selectWhereEns($idEns)
    {
      
        $requete = "select * from Enseigne where idEns = ".$idEns.";";
        $connect = connexion();
        $resultats = mysqli_query($connect, $requete);

        $ligne = mysqli_fetch_assoc($resultats);
        deconnexion($connect);
        return $ligne;
    }

?>

<?php
/******************************Gestion RDV******************************************** */



    function insertRDV($tab)
    {
        $requete =" insert into RDV values (null,'".$tab['idEns']."', '".$tab['idAssocia']."',
        '".$tab['dateRDV']."', '".$tab['heureRDV']."','".$tab['adresseRDV']."');";

        //$requete =" insert into RDV values (null,'".$tab['dateRDV']."', '".$tab['heureRDV']."',
        //'".$tab['nomEns']."');";

        echo $requete;
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php
    function selectAllRDV($mot ="")
    {
        if($mot == "")
        {
            $requete = "select E.nomEns, A.nomAssocia,
            R.idRDV, R.dateRDV, R.heureRDV  
            from RDV R, Enseigne E, Association A
            where E.idEns = R.idEns and A.idAssocia = R.idAssocia ;";
        }
        else
        {
            $requete   = "select E.nomEns, A.nomAssocia,
            R.idRDV, R.dateRDV, R.heureRDV 
            from RDV R, Enseigne E, Association A
            where E.idEns = R.idEns and A.idAssocia = R.idAssocia
            and (nomEns like '%'.$mot.'%' 
            or nomAssocia like '".$mot."%')";             
        }


        $connect   = connexion();
        $resultats = mysqli_query($connect, $requete);

        $tab = array();

        while ($ligne = mysqli_fetch_assoc($resultats))
        {
            $tab[] = $ligne;
        }

        deconnexion($connect);
        return $tab;
    }
?>

<?php
    function deleteRDV($idRDV)
    {
        $requete =" delete from RDV where idRDV = ".$idRDV.";";
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }

?>


<?php
    function updateRDV($tab)
    {
        $requete ="update RDV set idEns = '".$tab['idEns']."', idAssocia = '".$tab['idAssocia']."'
        , dateRDV = '".$tab['dateRDV']."', heureRDV = '".$tab['heureRDV']."', adresseRDV = '".$tab['adresseRDV']."'
        where idRDV = ".$tab['idRDV'].";" ; 
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }
?>

<?php
    function selectWhereRDV($idRDV)
    {

        $requete = "select * from RDV where idRDV = ".$idRDV.";";
        $connect = connexion();
        $resultats = mysqli_query($connect, $requete);

        $ligne = mysqli_fetch_assoc($resultats);
        deconnexion($connect);
        return $ligne;
    }

?>



<?php

/****************************************Demande****************************************** */

    function insertDemande($tab)
    {
        $requete =" insert into Demande values (null, '".$tab['idAssocia']."','".$tab['idEns']."',
        '".$tab['motifDemande']."', '".$tab['dateDemande']."');" ; 
        echo $requete;
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }


    function selectAllDemandes($mot ="")
    {
        if( $mot == "")
        {
            $requete = "select d.idDemande, d.motifDemande, d.dateDemande, a.nomAssocia, e.nomEns
            from Demande d, Association a, Enseigne e
            where a.idAssocia = d.idAssocia and e.idEns = d.idEns;";
        }
        
        else
        {
            $requete = "select d.idDemande, d.motifDemande, d.dateDemande, a.nomAssocia, e.nomEns
            from Demande d, Association a, Enseigne e
            where a.idAssocia = d.idAssocia and e.idEns = d.idEns
            where (motifDemande like '%'.$mot.'%'
            or dateDemande like '%".$mot."%' );";
                       
        }


        $connect   = connexion();
        $resultats = mysqli_query($connect, $requete);

        $tab = array();

        while ($ligne = mysqli_fetch_assoc($resultats))
        {
            $tab[] = $ligne;
        }

        deconnexion($connect);
        return $tab;
    }



    function deleteDemande($idDemande)
    {
        $requete =" delete from Demande where idDemande = ".$idDemande.";";
        
        
        $connect = connexion ();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }




    function updateDemande($tab)
    {
        $requete ="update Demande set idAssocia = '".$tab['idAssocia']."', idEns =  '".$tab['idEns']."',
        motifDemande = '".$tab['motifDemande']."', dateDemande = '".$tab['dateDemande']."'
        where idDemande = ".$tab['idDemande'].";" ; 
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }



    function selectWhereDemande($idDemande)
    {
      
        $requete = "select * from Demande where idDemande = ".$idDemande.";";
        $connect = connexion();
        $resultats = mysqli_query($connect, $requete);

        $ligne = mysqli_fetch_assoc($resultats);
        deconnexion($connect);
        return $ligne;
    }
?>


<?php

/************************************Offre*************************************** */
    function insertOffre($tab)
        {
            $requete =" insert into Offre values (null, '".$tab['typeOffre']."', '".$tab['dateOffre']."'
            , '".$tab['idProd']."','".$tab['idEns']."');" ; 
            echo $requete;
            
            $connect = connexion();
            mysqli_query($connect, $requete);
            deconnexion($connect);
        }



        function selectAllOffres($mot ="")
        {
            if($mot == "")
            {
                $requete   = "select o.idOffre, o.typeOffre, o.dateOffre,
                p.nomProd, p.quantiteProd, e.nomEns  
                from Offre o, Produit p, Enseigne e 
                where e.idEns = o.idEns and p.idProd = o.idProd ;";
            }
            else
            {
                $requete   = "select o.idOffre, o.typeOffre, o.dateOffre,
                p.nomProd, p.quantiteProd, e.nomEns
                from Offre o, Produit p, Enseigne e 
                where e.idEns = o.idEns and p.idProd = o.idProd 
                (where typeOffre like '%'.$mot.'%' 
                or dateOffre like '%"."');";             
            }


            $connect   = connexion();
            $resultats = mysqli_query($connect, $requete);

            $tab = array();
            while ($ligne = mysqli_fetch_assoc($resultats))
            {
                $tab[] = $ligne;
            }

            deconnexion($connect);
            return $tab;
        }
        
        function deleteOffre($idOffre)
        {
            $requete =" delete from Offre where idOffre = ".$idOffre.";";
            
            
            $connect = connexion();
            mysqli_query($connect, $requete);
            deconnexion($connect);
        }


        function updateOffre($tab)
        {
            $requete ="update Offre set typeOffre = '".$tab['typeOffre']."', dateOffre = '".$tab['dateOffre']."',
            idProd = '".$tab['idProd']."', idEns = '".$tab['idEns']."'
            where idOffre = ".$tab['idOffre'].";" ; 
            
            
            $connect = connexion();
            mysqli_query($connect, $requete);
            deconnexion($connect);
        }

        function selectWhereOffre($idOffre)
        {
        
            $requete = "select * from Offre where idOffre = ".$idOffre.";";
            $connect = connexion();
            $resultats = mysqli_query($connect, $requete);

            $ligne = mysqli_fetch_assoc($resultats);
            deconnexion($connect);
            return $ligne;
        }
?>

<?php
/*****************************Produit******************************** */



    function insertProduit($tab)
    {
        $requete =" insert into Produit values (null, '".$tab['nomProd']."', '".$tab['categorie']."'
        ,'".$tab['datePeremption']."','".$tab['quantiteProd']."','".$tab['marqueProd']."'
        ,'".$tab['origineProd']."');" ; 
        echo $requete;
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }



    function selectAllProduits($mot ="")
    {
        if($mot == "")
        {
            $requete   = "select * from Produit ;";
        }
        else
        {
            $requete   = "select * from Produit where nomProd like '%'.$mot.'%' or 
            categorie like '%".$mot."%' or datePeremption like '%".$mot."%' 
            or quantiteProd '%".$mot."'";             
        }


        $connect   = connexion();
        $resultats = mysqli_query($connect, $requete);

        $tab = array();
        while ($ligne = mysqli_fetch_assoc($resultats))
        {
            $tab[] = $ligne;
        }

        deconnexion($connect);
        return $tab;
    }

    function deleteProd($idProd)
    {
        $requete =" delete from Produit where idProd = ".$idProd.";";
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }


    function updateProd($tab)
    {
        $requete ="update Produit set nomProd = '".$tab['nomProd']."', categorie = '".$tab['categorie']."'
        , datePeremption = '".$tab['datePeremption']."', quantiteProd = '".$tab['quantiteProd']."', marqueProd = '".$tab['marqueProd']."'
        , origineProd = '".$tab['origineProd']."'
        where idProd = ".$tab['idProd'].";" ; 
        
        
        $connect = connexion();
        mysqli_query($connect, $requete);
        deconnexion($connect);
    }

    function selectWhereProd($idProd)
    {

        $requete = "select * from Produit where idProd = ".$idProd.";";
        $connect = connexion();
        $resultats = mysqli_query($connect, $requete);

        $ligne = mysqli_fetch_assoc($resultats);
        deconnexion($connect);
        return $ligne;
    }
?>
