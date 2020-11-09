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
    <title>Tableau Employes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php

        include_once('../Métier/Employe2.php');
        include('../DAO/EmployesMysqliDAO.php');


        if($_SESSION["profil"] == "admin"){
            if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajout') { 
                if (isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { 
            
                    $employe = new Employe2();                                                  
            
                    $id = $_POST['noemp'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $emp = $_POST['emploi'];
                    $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
                    $embauche = $_POST['embauche'];
                    $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
                    $comm = $_POST['comm'] ? $_POST['comm'] : NULL;
                    $noser = $_POST['noserv'];

                    $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noser);
                    EmployesMysqliDAO::addEmploye($employe);                           // Ajout de l'employe
                }
            }elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif') {               // Partie Modif
                    
                    $employe = new Employe2();
                    
                    $id = $_POST['noemp'];
                    $nom = $_POST['nom'];
                    $prenom = $_POST['prenom'];
                    $emp = $_POST['emploi'];
                    $sup = $_POST['sup'] ? $_POST['sup'] : NULL;
                    $embauche = $_POST['embauche'];
                    $sal = $_POST['sal'] ? $_POST['sal'] : NULL;
                    $comm = $_POST['comm'] ? $_POST['comm'] : NULL;
                    $noser = $_POST['noserv'];

                    $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noser);
                    EmployesMysqliDAO::editEmploye($employe);
            }
            elseif(isset($_GET["action"]) && $_GET["action"] == "delete"){                         // Partie Delete
                    // Check Crud.php
                    EmployesMysqliDAO::deleteEmployes($_GET["NOEMP"]);
            }
        };
    ?>
    <div class="container">
        <table class="table-hover table-bordered">
            <thead class="table">

                <td>Noemp</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Emploi</td>
                <td>Sup</td>
                <td>Embauche</td>
                <?php if($_SESSION["profil"] == "admin"){ echo '<td>Sal</td>'; } ?>
                <?php if($_SESSION["profil"] == "admin"){ echo '<td>Comm</td>'; } ?>
                <td>Noserv</td>
                <?php if($_SESSION["profil"] == "admin"){
                echo '<td>Modifier</td>
                    <td>Suppimer</td>';} ?>
            </thead>
        <?php if($_SESSION["profil"] == "admin"){?>
         <div class="row">
            <div class=" col-lg-12 text-center">
                <form action="../Présentation/formulaire.php?action=ajout" method="post" >
                        <input type="submit" value="Ajouter" class="add">
                </form>
            </div>
        </div> <?php }; ?> 
    </div>
    
    <?php  
    
    // Check Crud.php
    $donnees=EmployesMysqliDAO::rechercheEmployes();           
    EmployesMysqliDAO::affichageEmployes($donnees);               // Partie Affichage
   
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
