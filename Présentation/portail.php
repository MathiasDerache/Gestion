<?php
session_start();

include('../DAO/UtilisateurMysqliDAO.php');

if(isset($_POST["username"]) && !empty($_POST["username"])){
    $data = UtilisateurMysqliDAO::rechercheUser($_POST["username"]);
    if ($data && password_verify($_POST["mdp"], $data["password"])) {
        $_SESSION['userName'] = $_POST["username"];
        $_SESSION['profil'] = $data["profil"];
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Portail</title>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-center textP">
            <?php if(isset($_POST["username"]) && !empty($_POST["username"])){ if(password_verify($_POST["mdp"], $data["password"])){ echo '<h2 class="acc">Bonjour,<br> vous êtes bien connecté.</h2> '; }else{ echo '<h2 class="acc">Mot de Passe ou User Name Incorrect.</h2>' ;}}else{echo '<h2 class="acc">Bonjour,<br> vous êtes bien connecté.</h2> '; }?>
        </div>
        <div class="col-lg-3 text-center rowP">
            <a href="../Contrôleur/tableau_employes.php"><button type="button" class="btn btn-primary btn-lg portail">Tableau Employés</button></a>
        </div>

        <div class="col-lg-3 text-center rowP">
            <a href="../Contrôleur/tableau_services.php"><button type="button" class="btn btn-primary btn-lg portail">Tableau Services</button></a>
        </div>
        <div class="col-lg-3 text-center rowP">
            <a href="session_destroy.php"><button type="button" class="btn btn-primary btn-lg deco">Déconnexion</button></a>
        </div>
    </div>
</div>
</body>
</html>