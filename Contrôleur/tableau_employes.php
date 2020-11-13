 <?php
session_start();
if(!isset($_SESSION["userName"])){
    header('Location: form_connexion_controleur.php');
};
include('../Service/EmployesService.php');
include_once('../Métier/Employe2.php');
include('../Présentation/affichage_tableau_emp.php');

if(empty($_POST) && empty($_GET['action'])){
    head();
    table();
    affiche();
    btn();
}
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
            EmployesService::addEmp($employe);                          // Ajout de l'employe
            head();
            table();
            affiche();
            btn();
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
            EmployesService::editEmp($employe);
            head();
            table();
            affiche();
            btn();
    }
    elseif(isset($_GET["action"]) && $_GET["action"] == "delete"){                         // Partie Delete
            // Check Crud.php
            EmployesService::deleteEmp($_GET["NOEMP"]);
            head();
            table();
            affiche();
            btn();
    }
};
?>
 