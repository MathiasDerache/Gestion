<?php

    class EmployesMysqliDAO{

        // Connecte à la base de données
        static function connectTo(){

            $mysqli = new mysqli('localhost', 'mathiasderache', 'mathiasderache', 'gestion_employes');
            return $mysqli;
        }


        // Recherche le tableau des employes
        static function rechercheEmployes(){
            $mysqli=EmployesMysqliDAO::connectTo();
            mysqli_query($mysqli, 'SELECT * FROM emp');
            $serv = mysqli_query($mysqli, 'SELECT * FROM emp');
            $row = mysqli_fetch_all($serv, MYSQLI_ASSOC);
            return $row;
            
        }

        // affiche le tableau des employes
        static function affichageEmployes($row){
            foreach ($row as $value) { 

                echo  "<tr>";
                echo "<td>" . $value["noemp"] . "</td>";
                echo "<td>" . $value["nom"] . "</td>";
                echo "<td>" . $value["prenom"] . "</td>";
                echo "<td>" . $value["emploi"] . "</td>";
                echo "<td>" . $value["sup"] . "</td>";
                echo "<td>" . $value["embauche"] . "</td>";
                if($_SESSION["profil"] == "admin"){echo "<td>" . $value["sal"] . "</td>";};
                if($_SESSION["profil"] == "admin"){echo "<td>" . $value["comm"] . "</td>";};
                echo "<td>" . $value["noserv"] . "</td>";
            
                if($_SESSION["profil"] == "admin"){
                    echo '<td> <a href="../Présentation/formulaire.php?action=modif&NOEMP='  .$value["noemp"]  .'"><button type="button" class="btn btn-primary modif">Modifier</button></a> </td>';
                    // condition pour afficher les bouttons supprimer uniquement sur les lignes concernés
                    if(!array_search($value["noemp"], EmployesMysqliDAO::supEmployes())){
                        echo '<td> <a href="tableau_employes.php?action=delete&NOEMP=' .$value["noemp"]   .'"><button type="button" class="btn btn-danger">SUPPR</button></a> </td>';
                    }
                }
                
                echo "</tr>";
            }
        }
        // Ajouter une ligne
        static function addEmploye(Employe2 $employe): void
        {
            $mysqli=EmployesMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("INSERT INTO emp VALUES(?,?,?,?,?,?,?,?,?)");
            $id = $employe->getNoemp();
            $nom = $employe->getNom();
            $prenom = $employe->getPrenom();
            $emp = $employe->getEmploi();
            $sup = $employe->getSup();
            $embauche = $employe->getEmbauche();
            $sal = $employe->getSal();
            $comm = $employe->getComm();
            $noser = $employe->getNoserv();
            $stmt->bind_param('isssisddi',$id, $nom, $prenom, $emp, $sup, $embauche, $sal, $comm, $noser);
            $stmt->execute();
            $mysqli->close();
        }
        //Supprimer une ligne
        static function deleteEmployes($thisDelete){

            $mysqli=EmployesMysqliDAO::connectTo();
            $stmt=$mysqli->prepare('DELETE FROM emp WHERE noemp = ?');
            $stmt->bind_param("i", $thisDelete);
            $stmt->execute();
        }

        // recherche d'un employe
        static function rechercheUnEmploye($noemp){

            $mysqli=EmployesMysqliDAO::connectTo();
            $stmt = $mysqli->prepare('SELECT * FROM emp WHERE noemp=?');
            $stmt->bind_param('i', $noemp);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $mysqli->close();
            return $data;
        }

        // Modifier une ligne
        static function editEmploye(Employe2 $employe): void
        {
            $mysqli=EmployesMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("UPDATE emp SET  nom=?, prenom=?, emploi=?, sup=?, embauche=?, sal=?, comm=?  WHERE noemp=?");
            $id = $employe->getNoemp();
            $nom = $employe->getNom();
            $prenom = $employe->getPrenom();
            $emp = $employe->getEmploi();
            $sup = $employe->getSup();
            $embauche = $employe->getEmbauche();
            $sal = $employe->getSal();
            $comm = $employe->getComm();

            $stmt->bind_param('sssisddi', $nom, $prenom, $emp, $sup, $embauche, $sal, $comm, $id);
            $stmt->execute();
            $mysqli->close();
        }
        // Fonction Recherche des numero d'employes'different dans le tableau employes
        static function supEmployes(){

            $mysqli=EmployesMysqliDAO::connectTo();
            $src=mysqli_query($mysqli , 'SELECT DISTINCT sup FROM emp');
            $i = 1;
            while ($row = mysqli_fetch_array($src, MYSQLI_ASSOC)){
                $array[$i] = $row["sup"];
                $i ++;
            }
            return $array;
        }

    }
?>