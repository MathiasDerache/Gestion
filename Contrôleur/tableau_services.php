<?php
session_start();
if(!isset($_SESSION["userName"])){
    header('Location: form_connexion.php');
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Service</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
        include_once('../Métier/Service2.php');
        include('../DAO/ServiceMysqliDAO.php');

        ServiceMysqliDAO::connectTo();
        
        if($_SESSION["profil"] == "admin"){
            if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajout') {       // Ajout 
                if (isset($_POST['noserv'])) { 
                   
                    $noserv = $_POST['noserv'];
                    $serv = $_POST['service'] ? $_POST['service']  : NULL;
                    $ville = $_POST['ville'] ? $_POST['ville']  : NULL;
            
                    $service2 = new Service2();
                    $service2->setNoserv($noserv)->setService($serv)->setVille($ville);
                    $data = ServiceMysqliDAO::add($service2);
                }
                }elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif') {   // Modif
    
                    $noserv = $_POST['noserv'];
                    $serv = $_POST['service'] ? $_POST['service']  : NULL;
                    $ville = $_POST['ville'] ? $_POST['ville']  : NULL;
                
                    $service2 = new Service2();
                    $service2->setNoserv($noserv)->setService($serv)->setVille($ville);
                    // Check Crud_Service
                    ServiceMysqliDAO::editService($service2);
                }
            if(isset($_GET["action"]) && $_GET["action"] == "delete"){                     // Partie Delete
                // Check Crud_service.php
                ServiceMysqliDAO::deleteService($_GET["NOSERV"]);
            }
        }
    ?>
    <div class="container">
        <table class="table-hover table-bordered">
            <thead class="table">

                <td>Noserv</td>
                <td>Service</td>
                <td>Ville</td>
                <?php if($_SESSION["profil"] == "admin"){
                echo '<td>Modifier</td>
                    <td>Suppimer</td>';} ?>
            </thead>  
        <?php if($_SESSION["profil"] == "admin"){?>
        <div class="row">
            <div class=" col-lg-12 text-center">
                <form action="../Présentation/formulaire_services.php?action=ajout" method="post" >
                        <input type="submit" value="Ajouter" class="add">
                </form>
            </div>
        </div> <?php }; ?>  
    
    </div>

     <?php 
     // Check Crud_service.php 
    $donnees=ServiceMysqliDAO::rechercheService();
    ServiceMysqliDAO::afficherService($donnees);                              // Partie Affichage

    ?>

<div class="container">
    <div class="row">
        <div class="col-lg-4 text-center">
            <a href="tableau_employes.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Employés</button></a>
        </div>

        <div class="col-lg-4 text-center">
            <a href="tableau_services.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Services</button></a>
        </div>

        <div class="col-lg-4 text-center">
            <a href="../Présentation/portail.php"><button type="button" class="btn btn-primary btn-lg autre">Portail</button></a>
        </div>
    </div>
</div>

</body>

</html>
