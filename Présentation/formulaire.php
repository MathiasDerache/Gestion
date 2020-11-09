<?php
session_start();
if(!isset($_SESSION["userName"]) || $_SESSION["profil"] != "admin"){
    header('Location: form_connexion.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container formulaire">
    <?php

        include('../DAO/EmployesMysqliDAO.php');
        include('../Métier/Employe2.php');

        if ($_GET["action"] == "ajout") {
            $action='action=ajout';
            $noemp1=NULL;
            $nom1=NULL;
            $prenom1=NULL;
            $emploi1=NULL;
            $sup1=NULL;
            $embauche1=NULL;
            $sal1=NULL;
            $comm1=NULL;
            $noserv1=NULL;

        }elseif($_GET["action"] == "modif"){
            $mysqli=EmployesMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("SELECT * FROM emp WHERE noemp= ?");
            $stmt->bind_param('i', $_GET['NOEMP']);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $mysqli->close();

            $action='action=modif&NOEMP='.$data["noemp"].'';
            $noemp1=$data["noemp"];
            $nom1=$data["nom"];
            $prenom1=$data["prenom"];
            $emploi1=$data["emploi"];
            $sup1=$data["sup"];
            $embauche1=$data["embauche"];
            $sal1=$data["sal"];
            $comm1=$data["comm"];
            $noserv1=$data["noserv"];

        }
    ?>
           <form action="../Contrôleur/tableau_employes.php?<?php echo $action ?>" method="post">
    
               <div class="row une">
                    <div class="col-lg-12">
                    <label for="noemp"> Noemp : </label>
                    <input type="number" class="form-control" id="noemp" name="noemp" value="<?php echo $noemp1 ?>" placeholder="Saisir votre numéro employé" required>
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-6">
                    <label for="nom"> Nom : </label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom1 ?>" placeholder="Saisir votre nom"><br />
                    </div>

                
                    <div class="col-lg-6">
                    <label for="prenom"> Prenom : </label>
                    <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom1 ?>" placeholder="Saisir votre prénom"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-8">
                    <label for="emploi"> Emploi : </label>
                    <input type="text" class="form-control" id="emploi" name="emploi" value="<?php echo $emploi1 ?>" placeholder="Saisir votre emploi"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="sup"> Sup : </label>
                    <input type="text" class="form-control" id="sup" name="sup" value="<?php echo $sup1 ?>" placeholder="saisir numéro de supérieur"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-4">
                    <label for="embauche"> Date d'embauche : </label>
                    <input type="date" class="form-control" id="embauche" name="embauche" value="<?php echo $embauche1 ?>" placeholder="JJ/MM/AAAA"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="sal"> Salaire : </label>
                    <input type="number" class="form-control" id="sal" name="sal" value="<?php echo $sal1 ?>" placeholder="saisir votre salaire"><br />
                    </div>

                    <div class="col-lg-4">
                    <label for="comm"> Commission : </label>
                    <input type="text" class="form-control" id="comm" name="comm" value="<?php echo $comm1 ?>" placeholder="saisir votre commission"><br />
                    </div>
                </div>

                <div class="row une">
                    <div class="col-lg-12">
                    <label for="noserv"> Noserv : </label>
                    <input type="number" class="form-control" id="noserv" name="noserv" value="<?php echo $noserv1 ?>" placeholder="saisir votre numéro de service" required><br />
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

</html>
