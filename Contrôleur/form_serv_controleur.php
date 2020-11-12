<?php
session_start();
if(!isset($_SESSION["userName"]) || $_SESSION["profil"] != "admin"){
    header('Location: form_connexion_controleur.php');
};

include('../Métier/Service2.php');
include_once("../Service/ServiceService.php");
include('../Présentation/formulaire_services.php');



if ($_GET["action"] == "ajout") {

    $action='action=ajout';
    $noserv=NULL;
    $service=NULL;
    $ville=NULL;
    affichageComplet($action, $noserv,$service, $ville);

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
    affichageComplet($action,$data["noserv"],$data["service"],$data["ville"]);
}
?>