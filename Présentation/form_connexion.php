<?php


    function head(){
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="stylesheet" href="../Présentation/style.css">
            <title>connexion</title>
        </head>';
    }

    function form(){
        echo '<body>
                    <div class="container formulaire">
                        <div class="row text-center">
                            <div class="col-12">
                                <h2 class="titre">Connexion</h2>
                                <hr>
                            </div>
                        </div>
                        <form action= "../Présentation/portail.php" method="post">
                
                                <div class="row une">
                                    <div class="col-lg-12">
                                        <label for="username"> Email : </label>
                                        <input type="username" class="form-control" id="username" name="username" placeholder="Saisir votre Email" required>
                                    </div>
                                </div>
                
                                <div class="row une">
                                    <div class="col-lg-12">
                                        <label for="mdp"> Mot de Passe : </label>
                                        <input type="password" class="form-control" id="mdp" name="mdp" placeholder="Saisir votre mot de passe "><br/>
                                    </div>
                                </div>
                
                                <div class="row align-center">
                                    <div class="col-lg-12">
                                        <input type="submit" value="Se connecter" class="valide">
                                    </div>
                                </div>
                        </form>
                    </div>
                
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 text-center textP"><h2 class="insc">Pas encore inscrit ? <a href="form_inscription_controleur.php">Créez votre compte !</a></h2></div>
                        </div>
                    </div>
    </body>
    </html>';
    }

    function affichageComplet(){

        head();
        form();
    }
?>
