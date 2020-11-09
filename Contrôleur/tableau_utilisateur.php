<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php 
        include('../DAO/UtilisateurMysqliDAO.php');
        connectTo(); 

        if ( isset($_GET["action"]) && $_GET["action"] == "ajout" && !empty($_POST)){           //   Partie Ajout
            // Check Crud_utilisateur.php
            addEmployes();

        }elseif(isset($_GET["action"]) && $_GET["action"] == "delete"){                         // Partie Delete
            // Check Crud_utilisateur.php
            deleteEmployes();
        }

        if ( isset($_GET["action"]) && $_GET["action"] == "modif" && !empty($_POST)){           // Partie Modif
            // Check Crud_utilisateur.php
            modifEmployes();
        }
    ?>
    <div class="container">
        <table class="table-hover table-bordered">
            <thead class="table">

                <td>Id</td>
                <td>User Name</td>
                <td>Password</td>
                <td>Profil</td>
            </thead>

         <div class="row">
            <div class=" col-lg-12">
                <form action="formulaire.php?action=ajout" method="post" >
                        <input type="submit" value="Ajouter" class="add">
                </form>
            </div>
        </div>  
    </div>
    
    <?php  
    
    // Check Crud_utilisateur.php
    $donnees=rechercheEmployes();           
    affichageEmployes($donnees);               // Partie Affichage
   
    ?>

<div class="container">
    <div class="row">
        <div class="col-lg-6 text-center">
            <a href="tableau_employes.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Employés</button></a>
        </div>

        <div class="col-lg-6 text-center">
            <a href="tableau_services.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Services</button></a>
        </div>
    </div>
</div>


</body>

</html>