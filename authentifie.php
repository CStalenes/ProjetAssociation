<?php
    //session_start();
    
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

    /*$connect = mysqli_connect("localhost", "root", "", "DonAssociation3");

    if ( !$connect)
    {
        echo "Erreur de connexion à la base de donnee";
        exit;
    }

    function deconnexion($connect)
    {
        mysqli_close($connect);
    }*/



    /*if(isset($_POST['nomUtilisateur']) && isset($_POST['mdpUtilisateur'])){
        $email = $_POST['email'];
        $mdpUtilisateur = $_POST['mdpUtilisateur'];

        if(empty($email)){
            header("Location: inscription.php?error=Email est requis");
        }

        else if(empty($mdpUtilisateur)){
            header("Location: inscription.php?error=mdpUtilisateur est requis ");
        }        
        else{
            echo "Ok";
        }
    }*/


    $nomUtilisateur = "";
    $email ="";
    $errors = array();
    
    if(isset($_POST['inscription'])){

        $nomUtilisateur = $_POST['nomUtilisateur'];
        $email = $_POST['email'];
        $mdpUtilisateur1 = $_POST['mdpUtilisateur1'];
        $mdpUtilisateur2 = $_POST['mdpUtilisateur2'];


        if(empty($nomUtilisateur)){
            array_push($errors, " nomUtilisateur pas rempli");
        }

        if(empty($email)){
            array_push($errors, "Email pas rempli");
        }

        if(empty($mdpUtilisateur1)){
            array_push($errors, "MDP pas rempli");
        }

        if($mdpUtilisateur1 != $mdpUtilisateur2){
            array_push($errors, "MDP incorrect");
        }

        if(count($errors) == 0){
            
            $mdpUtilisateur = md5($mdpUtilisateur1);
            $requete = "insert into Utilisateur (nomUtilisateur, email, mdpUtilisateur) values('$nomUtilisateur', '$email' , '$mdpUtilisateur');";

            $connect = connexion();
            mysqli_query($connect, $requete);
            
            echo"hello";
            deconnexion($connect);
            
            /*$_SESSION['nomUtilisateur'] = $nomUtilisateur;
            $_SESSION['success'] = "Vous êtes bien enregistré";*/

            //header('location: index.php');

            /*echo"hello";
            deconnexion($connect);*/

        }

        /*else{
            echo "Ok";
        }*/
    }

    /*else{
        if(isset($_POST['nomUtilisateur']) && isset($_POST['mdpUtilisateur'])){
            $nomUtilsateur = $_POST['nomUtilisateur'];
            $mdpUtilisateur = $_POST['mdpUtilisateur'];
    
            if(empty($nomUtilsateur)){
                header("Location: enregistre.php?error= Nom d'utilisateur est requis");
            }
    
            else if(empty($mdpUtilisateur)){
                header("Location: enregistre.php?error=mdp est requis");
            }        
            else{
                echo "Ok";
            }
        }
        
    }*/


?>
