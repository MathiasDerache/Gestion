<?php


include('../DAO/UtilisateurMysqliDAO.php');

connectTo();

$data = rechercheUser($_POST["username"]);



if ($data && password_verify($_POST["mdp"], $data["password"])) {
    echo 'Vous êtes connecté !';
} else {
    echo 'Mot de passe ou Email invalide.';
}
?>