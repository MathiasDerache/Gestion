<?php
session_start();
if(!isset($_SESSION["userName"]) || $_SESSION["profil"] != "admin"){
    header('Location: form_connexion_controleur.php');
};
include('../Métier/Employe2.php');
include_once('../Service/EmployesService.php');
include('../Présentation/formulaire.php');

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
    affichageComplet($action, $noemp1, $nom1, $prenom1, $emploi1, $sup1, $embauche1, $sal1, $comm1, $noserv1);

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
    affichageComplet($action, $data["noemp"], $data["nom"], $data["prenom"], $data["emploi"],$data["sup"], $data["embauche"], $data["sal"], $data["comm"], $data["noserv"]);

}
?>