<?php
    include("../DAO/UtilisateurMysqliDAO.php");
    class UtilisateurService extends UtilisateurMysqliDAO{

        
        public function add($userName, $mdp, $profil){
            UtilisateurMysqliDAO::addUtilisateur($userName, password_hash($mdp, PASSWORD_DEFAULT),  "utilisateur" );
        }

    }
?>