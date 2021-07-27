<?php include('authentifie.php')?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_asso/register.css">
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">-->


        <title>Inscription</title>
    </head>
    
    
    <body>

        <div class = "top-login">
            <h2> Inscription</h2>
        </div>


        <form class="register-form" method = "post" action = "inscription.php">
            

            <!--<div class = "alerte-warning">
            
            </div>-->

            <!-- comme ya le div qui est utilise dans ficher error.php on doit mettre le include a la position ou y aurait le div-->
            <?php include('error.php');?>


            <div class = "insert-register">
                <label> Nom utilisateur</label>
                <input type ="text" name = "nomUtilisateur" value = "<?php echo $nomUtilisateur?>">
                <br>
            </div>

            <div class = "insert-register">
                <label> Email</label>
                <input type ="text" name = "email" value = "<?php echo $email ?>"> 
                <br>
            </div>

            <div class = "insert-register">
                <label> Mot De Passe </label>
                <input type ="password" name = "mdpUtilisateur1">
                <br>
            </div>

            
            <div class = "insert-register">
                <label> Confirme MDP </label>
                <input type ="password" name = "mdpUtilisateur2">
                <br>
            </div>
            <br>
            <br>

            <div class = "insert-register">
                <button type = "submit" name = "inscription" class = "btn"> Inscription </button>
            </div>

            <p>
                Si déja menbre, <a href ="enregistre.php"> S'enregistrer ici. </a>
            </p>

        </form>
        
    </body>

</html>