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
    <title>Formulaire Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container formulaire">
    <?php

        include('../DAO/ServiceMysqliDAO.php');


        if ($_GET["action"] == "ajout") {

            $action='action=ajout';
            $noserv=NULL;
            $service=NULL;
            $ville=NULL;

        }elseif($_GET["action"] == "modif"){
            $mysqli=ServiceMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("SELECT * FROM serv WHERE noserv= ?");
            $stmt->bind_param('i', $_GET['NOSERV']);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $mysqli->close();

            $action='action=modif&NOSERV='.$data["noserv"].'';
            $noserv=$data["noserv"];
            $service=$data["service"];
            $ville=$data["ville"];
        }
    ?>
           <form action="/../Contrôleur/tableau_services.php?<?php echo $action ?>" method="post">

                <div class="row une">
                        <div class="col-lg-12">
                        <label for="noserv"> Noserv : </label>
                        <input type="number" class="form-control" id="noserv" name="noserv" value="<?php echo $noserv ?>" placeholder="Saisir votre numéro de service" required>
                        </div>
                    </div>

                    <div class="row une">
                        <div class="col-lg-6">
                        <label for="service"> Service : </label>
                        <input type="text" class="form-control" id="service" name="service" value="<?php echo $service ?>" placeholder="Saisir votre service"><br />
                        </div>

                    
                        <div class="col-lg-6">
                        <label for="ville"> Ville : </label>
                        <input type="text" class="form-control" id="ville" name="ville" value="<?php echo $ville ?>" placeholder="Saisir votre ville"><br />
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

</html>
