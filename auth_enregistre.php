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

  
    

    /*if(isset($_POST['nomUtilisateur']) && isset($_POST['mdpUtilisateur'])){

        $nomUtilisateur = $_POST['nomUtilisateur'];
        $mdpUtilisateur = $_POST['mdpUtilisateur'];

        if(empty($nomUtilsateur)){
            header("Location: enregistre.php?error= Nom d'utilisateur est requis");
            exit();
        }

        else if(empty($mdpUtilisateur)){
            header("Location: enregistre.php?error=mdp est requis");
            exit();
        }        
        
        else{
            echo $requete = "select * from Utilisateur where nomUtilisateur = '$nomUtilisateur' and mdpUtilisateur = '$mdpUtilisateur';";
            
            $connect = connexion();
            $result = mysqli_query($connect, $requete);
            deconnexion($connect);

            if(mysqli_num_rows($result) == 1 ){
                $row = mysqli_fetch_assoc($result);
                print_r($row);
            }

        }  


    }

    else{
        header("Location: home.php");
        exit();
    }*/

?>