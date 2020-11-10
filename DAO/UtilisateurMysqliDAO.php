<?php

    class UtilisateurMysqliDAO{

        // connexion bdd
        static function connectTo(){

            $mysqli = new mysqli('localhost', 'mathiasderache', 'mathiasderache', 'gestion_employes');
            return $mysqli;
        }

        // Ajouter une ligne
        static function addUtilisateur($userName, $mdp, $profil){

            $mysqli=UtilisateurMysqliDAO::connectTo();

            $stmt = $mysqli->prepare("INSERT INTO utilisateur VALUES (Null, ?, ?, ?)");
            $stmt->bind_param("sss",$userName, $mdp, $profil);
            $stmt->execute();
        }

        //Recherche l'user dans la table
        static function rechercheUser($userName){
            $mysqli=UtilisateurMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("SELECT * FROM utilisateur WHERE userName = ?");
            $stmt->bind_param("s", $userName);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $rs->free();
            $mysqli->close();
            return $data;
        }
}
?>