<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>inscription</title>
</head>
<body>
    <div class="container formulaire">
    <form action= "ajout_utilisateur.php?ajout" method="post">
    
        <div class="row une">
             <div class="col-lg-12">
             <label for="username"> Email : </label>
             <input type="username" class="form-control" id="username" name="username" placeholder="Saisir votre Email" required>
             </div>
        </div>

        <div class="row une">
            <div class="col-lg-12">
                <label for="mdp"> Mot de Passe : </label>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Saisir votre mot de passe " required><br />
            </div>
        </div>

        <div class="row align-center">
            <div class="col-lg-12">
                <input type="submit" value="S'inscrire" class="valide">
            </div>
        </div>
    </form>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 text-center textP"><h2 class="insc">Déjà inscrit ? <a href="form_connexion.php">Connectez vous !</a></h2></div>
        </div>
    </div>

</body>
</html>