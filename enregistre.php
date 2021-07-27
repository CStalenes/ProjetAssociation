<?php include('auth_enregistre.php')?>

<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css_asso/register.css">
        <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">-->


        <title>Enregistrement</title>
    </head>
    
    
    <body>

        <div class = "top-login">
            <h2> Enregistrement</h2>
        </div>


        <form class="register-form" method = "post" action = "enregistre.php">
            
            <?php if(isset($_GET['error'])){?>

            <div class = "alerte-warning">
                <?=$_GET['error']?>
            </div>

            <?php }?>




           
            <!--<label> Nom utilisateur</label>
            <input type ="text" name = "nomUtilisateur">
            <br>
       
            <label> Mot De Passe </label>
            <input type ="password" name = "mdpUtilisateur">
            <br>
        
            <br>
            <br>

            <button type = "submit" name = "enregistré"> Enregistré </button>
            

            <p>
                Pas encore menbre, <a href ="inscription.php"> S'inscrire ici </a>
            </p>-->


            <div class = "insert-register">
                <label> Nom utilisateur</label>
                <input type ="text" name = "nomUtilisateur">
                <br>
            </div>

            <div class = "insert-register">
                <label> Mot De Passe </label>
                <input type ="password" name = "mdpUtilisateur">
                <br>
            </div>

            <br>
            <br>

            <div class = "insert-register">
                <button type = "submit" name = "enregistré" class = "btn"> Enregistré </button>
            </div>            

            <p>
                Pas encore menbre, <a href ="inscription.php"> S'inscrire ici </a>
            </p>

        </form>
        
    </body>

</html>