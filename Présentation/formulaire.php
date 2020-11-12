<?php

    function head(){
        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Formulaire</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="stylesheet" href="../Présentation/style.css">
        </head>';
    }

    function form($action, $noemp1, $nom1, $prenom1, $emploi1, $sup1, $embauche1, $sal1, $comm1, $noserv1){
        echo '<body>
        <div class="container formulaire">
            <form action="tableau_employes.php?'.$action.'" method="post">
    
                <div class="row une">
                    <div class="col-lg-12">
                    <label for="noemp"> Numéro employé : </label>
                    <input type="number" class="form-control" id="noemp" name="noemp" value="'.$noemp1.'" placeholder="Saisir votre numéro employé" required>
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-6">
                    <label for="nom"> Nom : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="'.$nom1.'" placeholder="Saisir votre nom"><br />
                    </div>

                
                    <div class="col-lg-6">
                    <label for="prenom"> Prénom : </label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="'.$prenom1.'" placeholder="Saisir votre prénom"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-8">
                    <label for="emploi"> Emploi : </label>
                    <input type="text" class="form-control" id="emploi" name="emploi" value="'.$emploi1.'" placeholder="Saisir votre emploi"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="sup"> Supérieur : </label>
                    <input type="text" class="form-control" id="sup" name="sup" value="'.$sup1.'" placeholder="saisir numéro de supérieur"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-4">
                    <label for="embauche"> Date embauche : </label>
                    <input type="date" class="form-control" id="embauche" name="embauche" value="'.$embauche1.'" placeholder="JJ/MM/AAAA"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="sal"> Salaire : </label>
                    <input type="number" class="form-control" id="sal" name="sal" value="'.$sal1.'" placeholder="saisir votre salaire"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="comm"> Commission : </label>
                    <input type="text" class="form-control" id="comm" name="comm" value="'.$comm1.'" placeholder="saisir votre commission"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-12">
                    <label for="noserv"> Numéro de Service : </label>
                    <input type="number" class="form-control" id="noserv" name="noserv" value="'.$noserv1.'" placeholder="saisir votre numéro de service" required><br />
                    </div>
                </div>

                <div class="row align-center">
                    <div class="col-lg-6">
                        <input type="submit" value="Valide" class="valide">
                    </div>
                </div>
            </form>
        </div>
        </body>
        </html>';
    }

    function affichageComplet($action, $noemp1, $nom1, $prenom1, $emploi1, $sup1, $embauche1, $sal1, $comm1, $noserv1){
        head();
        form($action, $noemp1, $nom1, $prenom1, $emploi1, $sup1, $embauche1, $sal1, $comm1, $noserv1);
    }
?>



