<?php
session_start();


    include('../DAO/UtilisateurMysqliDAO.php');

    $data = UtilisateurMysqliDAO::rechercheUser($_POST["username"]);
    if(empty($data)){

        UtilisateurMysqliDAO::addUtilisateur($_POST["username"], password_hash($_POST["mdp"], PASSWORD_DEFAULT),  "utilisateur" );
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<div class="contaner-fluid">
    <div class="row">
        <div class="col-lg-12 text-center textP">
           <?php if(empty($data)){ echo '<h2 class="acc">Inscription réussi !<br>Connetez vous pour accèder au portail</h2>';}else{echo '<h2 class="acc">User Name déja utilisé !</h2>';} ?>
        </div>
        <div class="col-lg-10 text-center rowP">
        <?php if(empty($data)){ echo '<a href="form_connexion.php"><button type="button" class="btn btn-primary portail">Me connecter</button></a>';}else{ echo '<a href="Form_inscription.php"><button type="button" class="btn btn-primary portail">Réessayer</button></a> ';} ?>
        </div>
    </div>
</div>
</body>
</html>