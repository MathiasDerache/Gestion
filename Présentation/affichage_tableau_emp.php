<?php
require_once('../Contrôleur/tableau_employes.php');


function afficheErreurAjout($message, $errorCode=null){
    if($errorCode && $errorCode == 1062){
        echo "<div class='alert alert-danger' role='alert'>Impossible de créer un nouvel employé avec un numéro d'employé déjà existant !</div>";
    }
}

function afficheErreurModif($message, $errorCode=null){
    print_r($errorCode);
    if($errorCode && $errorCode == 1062){
        echo "<div class='alert alert-danger' role='alert'>Impossible de créer un nouvel employé avec un numéro d'employé déjà existant !</div>";
    }
}

    function head(){

        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Tableau Employes</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="stylesheet" href="../Présentation/style.css">
        </head>';
    }
    
    function table($compteur){
        echo'<body>
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                </div>
                <div class="col-12">
                    <h2 class="titre"> '.$compteur.' Employés ajoutés ce jour.</h2>
                        <h2 class="titre">Tableau des Employés</h2>
                        <hr>
                </div>
                </div>
                <table class="table-hover table-bordered" id="tableau">
                    <thead class="table">
        
                        <td>Noemp</td>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>Emploi</td>
                        <td>Sup</td>
                        <td>Embauche</td>';
                        if($_SESSION["profil"] == "admin"){ echo '<td>Sal</td>'; } 
                        if($_SESSION["profil"] == "admin"){ echo '<td>Comm</td>'; } 
                        echo '<td>Noserv</td>';
                        if($_SESSION["profil"] == "admin"){
                        echo '<td>Modifier</td>
                            <td>Suppimer</td>';} 
                    echo '</thead>';
                    if($_SESSION["profil"] == "admin"){
                 echo '<div class="row">
                    <div class=" col-lg-12 text-center">
                        <form action="form_emp_controleur.php?action=ajout" method="post" >
                                <input type="submit" value="Ajouter" class="add">
                        </form>
                    </div>
                </div>'; }
           echo ' </div> ';
    }

    function affiche(){
    // Check Crud.php
        $donnees=EmployesMysqliDAO::rechercheEmployes();    
        EmployesMysqliDAO::affichageEmployes($donnees);               // Partie Affichage
    }

    function btn(){
        echo '<div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <a href="../Contrôleur/tableau_employes.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Employés</button></a>
            </div>
    
            <div class="col-lg-4 text-center">
                <a href="../Contrôleur/tableau_services.php"><button type="button" class="btn btn-primary btn-lg autre">Tableau Services</button></a>
            </div>
    
            <div class="col-lg-4 text-center">
                <a href="../Présentation/portail.php"><button type="button" class="btn btn-primary btn-lg autre">Portail</button></a>
            </div>
        </div>
        <div class="row">
        <div class="row une">
            <form action="" method="get">
            <div class="col-lg-3">
            <label for="nom"> Nom : </label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Saisir un nom">
            </div>

            <div class="col-lg-3">
            <label for="prenom"> Prenom : </label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Saisir un prénom">
            </div>

            <div class="col-lg-3">
            <label for="emploi"> Emploi : </label>
            <input type="text" class="form-control" id="emploi" name="emploi" placeholder="Saisir un emploi">
            </div>

            <div class="col-lg-3">
            <label for="noserv"> Numéro de service : </label>
            <input type="number" class="form-control" id="noserv" name="noserv" placeholder="Saisir num. de service">
            </div>
            </form>
    </div>
        </div>
    </div>
    
    
    </body>
    <script src="../Contrôleur/jquery-3.5.1.min.js"></script>
    <script src="cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js></script>
    <script src="../Contrôleur/app.js"></script>
    
    </html>';
    }
?>