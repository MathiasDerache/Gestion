<?php 
session_start();
if(!isset($_SESSION["userName"])){
    header('Location: form_connexion_controleur.php');
};
include('../Service/ServiceService.php');
include_once('../Métier/Service2.php');
include('../Présentation/affichage_tableau_service.php');

if(empty($_POST) && empty($_GET['action'])){
    head();
    table();
    affiche();
    btn();
}
if($_SESSION["profil"] == "admin"){
    if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajout') {       // Ajout 
        if (isset($_POST['noserv'])) { 
            
            $noserv = htmlentities($_POST['noserv']);
            $serv = htmlentities($_POST['service']) ? htmlentities($_POST['service'])  : NULL;
            $ville = htmlentities($_POST['ville']) ? htmlentities($_POST['ville'])  : NULL;
    
            $service2 = new Service2();
            $service2->setNoserv($noserv)->setService($serv)->setVille($ville);
            try{
                $data = ServiceService::addServ($service2);
            }catch(ServiceException $se){
                afficheErreurAjout($se->getMessage(), $se->getCode());
            }

            head();
            table();
            affiche();
            btn();
        }
        }elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif') {   // Modif

            $noserv = htmlentities($_POST['noserv']);
            $serv = htmlentities($_POST['service']) ? htmlentities($_POST['service'])  : NULL;
            $ville = htmlentities($_POST['ville']) ? htmlentities($_POST['ville'])  : NULL;
        
            $service2 = new Service2();
            $service2->setNoserv($noserv)->setService($serv)->setVille($ville);
            // Check Crud_Service
            try{
                ServiceService::editServ($service2);
            }catch(ServiceException $se){
                afficheErreurModif($se->getMessage(), $se->getCode());
            }

            head();
            table();
            affiche();
            btn();
        }
    if(isset($_GET["action"]) && $_GET["action"] == "delete"){                     // Partie Delete
        // Check Crud_service.php
        ServiceService::deleteServ($_GET["NOSERV"]);
        head();
        table();
        affiche();
        btn();
    }
}
?>
