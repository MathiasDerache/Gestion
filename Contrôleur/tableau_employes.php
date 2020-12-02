 <?php
session_start();
if(!isset($_SESSION["userName"])){
    header('Location: form_connexion_controleur.php');
};
include('../Service/EmployesService.php');
include_once('../Métier/Employe2.php');
include('../Présentation/affichage_tableau_emp.php');
require_once("../Service/ServiceException.php");

if(empty($_POST) && empty($_GET['action'])){
    $compteur = EmployesService::count();
    head();
    table($compteur);
    affiche();
    btn();
}

if($_SESSION["profil"] == "admin"){
    if (!empty($_POST) && isset($_GET['action']) && $_GET['action'] == 'ajout') { 
        if (isset($_POST['noemp']) && !empty($_POST['noemp']) && isset($_POST['noserv']) && !empty($_POST['noserv'])) { 


            $employe = new Employe2();                                                  
    
            $id = htmlentities($_POST['noemp']);
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $emp = htmlentities($_POST['emploi']);
            $sup = htmlentities($_POST['sup']) ? htmlentities($_POST['sup']) : NULL;
            $embauche = htmlentities($_POST['embauche']);
            $sal = htmlentities($_POST['sal']) ? htmlentities($_POST['sal']) : NULL;
            $comm = htmlentities($_POST['comm']) ? htmlentities($_POST['comm']) : NULL;
            $noser = htmlentities($_POST['noserv']);

            $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noser);
            try{

            EmployesService::addEmp($employe);      // ajout employé

            }catch(ServiceException $se){
            afficheErreurAjout($se->getMessage(), $se->getCode());
            }          
            $compteur = EmployesService::count();
            head();
            table($compteur);
            affiche();
            btn();
        }
    }elseif (!empty($_GET) && isset($_GET['action']) && $_GET['action'] == 'modif') {               // Partie Modif
            
            $employe = new Employe2();
            
            $id = htmlentities($_POST['noemp']);
            $nom = htmlentities($_POST['nom']);
            $prenom = htmlentities($_POST['prenom']);
            $emp = htmlentities($_POST['emploi']);
            $sup = htmlentities($_POST['sup']) ? htmlentities($_POST['sup']) : NULL;
            $embauche = htmlentities($_POST['embauche']);
            $sal = htmlentities($_POST['sal']) ? htmlentities($_POST['sal']) : NULL;
            $comm = htmlentities($_POST['comm']) ? htmlentities($_POST['comm']) : NULL;
            $noser = htmlentities($_POST['noserv']);

            $employe->setNoemp($id)->setNom($nom)->setPrenom($prenom)->setEmploi($emp)->setSup($sup)->setEmbauche($embauche)->setSal($sal)->setComm($comm)->setNoserv($noser);
            try{
                EmployesService::editEmp($employe);
            }catch(ServiceException $se){
                afficheErreurModif($se->getMessage(), $se->getCode());
            }
            $compteur = EmployesService::count();
            head();
            table($compteur);
            affiche();
            btn();
    }
    elseif(isset($_GET["action"]) && $_GET["action"] == "delete"){                         // Partie Delete
            // Check Crud.php
            EmployesService::deleteEmp($_GET["NOEMP"]);
            $compteur = EmployesService::count();
            head();
            table($compteur);
            affiche();
            btn();
    }
};
?>
 