<?php

    function head(){
        
        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire Service</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="stylesheet" href="../Présentation/style.css">
        </head>';
    }

    function form($action, $noserv,$service, $ville){
        echo '<body>
        <div class="container formulaire">
                   <form action="tableau_services.php?'.$action.'" method="post">
        
                        <div class="row une">
                                <div class="col-lg-12">
                                <label for="noserv"> Numéro de service : </label>
                                <input type="number" class="form-control" id="noserv" name="noserv" value="'.$noserv.'" placeholder="Saisir votre numéro de service" required>
                                </div>
                            </div>
        
                            <div class="row une">
                                <div class="col-lg-6">
                                <label for="service"> Service : </label>
                                <input type="text" class="form-control" id="service" name="service" value="'.$service.'" placeholder="Saisir votre service"><br />
                                </div>
        
                            
                                <div class="col-lg-6">
                                <label for="ville"> Ville : </label>
                                <input type="text" class="form-control" id="ville" name="ville" value="'.$ville.'" placeholder="Saisir votre ville"><br />
                                </div>
                            </div>
        
                            <div class="row align-center">
                                <div class="col-lg-12">
                                    <input type="submit" value="Valide" class="valide">
                                </div>
                            </div>
                    </form>
        
        </div>
        
        </body>
        
        </html>';
    }

    function affichageComplet($action, $noserv,$service, $ville){
        head();
        form($action, $noserv,$service, $ville);
    }
?>



