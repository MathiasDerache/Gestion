<?php
    
    require("DAOException.php");
    include_once('InterEmpDao.php');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);


    class EmployesMysqliDAO implements InterEmpDao{

        // Connecte à la base de données
        static function connectTo(){
            try{
                $mysqli = new mysqli('localhost', 'mathiasderache', 'mathiasderache', 'gestion_employes');
                return $mysqli;
            }catch(mysqli_sql_exception $e){
                throw  $e;
            }

        }
        // Recherche le tableau des employes
        static function rechercheEmployes(){
                $mysqli=EmployesMysqliDAO::connectTo();
                mysqli_query($mysqli, 'SELECT * FROM emp');
                $serv = mysqli_query($mysqli, 'SELECT * FROM emp');
                $data = mysqli_fetch_all($serv, MYSQLI_ASSOC);
                foreach ($data as $value) {
                    $tab[] = $employes = new Employe2();
                    $employes->setNoemp($value["noemp"])->setNom($value["nom"])->setPrenom($value["prenom"])->setEmploi($value["emploi"])->setSup($value["sup"])->setEmbauche($value["embauche"])->setSal($value["sal"])->setComm($value["comm"])->setNoserv($value["noserv"]);
                }
                return $tab;
        }
        

        // affiche le tableau des employes
        static function affichageEmployes($row){
            foreach ($row as $value) { 

                echo  "<tr>";
                echo "<td>" . $value->getNoemp() . "</td>";
                echo "<td>" . $value->getNom() . "</td>";
                echo "<td>" . $value->getPrenom() . "</td>";
                echo "<td>" . $value->getEmploi() . "</td>";
                echo "<td>" . $value->getSup(). "</td>";
                echo "<td>" . $value->getEmbauche() . "</td>";
                if($_SESSION["profil"] == "admin"){echo "<td>" . $value->getSal() . "</td>";};
                if($_SESSION["profil"] == "admin"){echo "<td>" . $value->getComm() . "</td>";};
                echo "<td>" . $value->getNoserv() . "</td>";
            
                if($_SESSION["profil"] == "admin"){
                    echo '<td> <a href="form_emp_controleur.php?action=modif&NOEMP='  .$value->getNoemp()  .'"><button type="button" class="btn btn-primary modif">Modifier</button></a> </td>';
                    // condition pour afficher les bouttons supprimer uniquement sur les lignes concernés
                    if(!array_search($value->getNoemp(), EmployesMysqliDAO::supEmployes())){
                        echo '<td> <a href="tableau_employes.php?action=delete&NOEMP=' .$value->getNoemp()   .'"><button type="button" class="btn btn-danger">SUPPR</button></a> </td>';
                    }
                }
                
                echo "</tr>";
            }
        }
        // Ajouter une ligne
            static function addEmploye(Employe2 $employe): void
            {

                $id = $employe->getNoemp();
                $nom = $employe->getNom();
                $prenom = $employe->getPrenom();
                $emp = $employe->getEmploi();
                $sup = $employe->getSup();
                $embauche = $employe->getEmbauche();
                $sal = $employe->getSal();
                $comm = $employe->getComm();
                $noser = $employe->getNoserv();
                try { 
                    $mysqli=EmployesMysqliDAO::connectTo();
                    $stmt = $mysqli->prepare("INSERT INTO emp VALUES(?,?,?,?,?,?,?,?,?)");
                    $stmt->bind_param('isssisddi',$id, $nom, $prenom, $emp, $sup, $embauche, $sal, $comm, $noser);
                    $stmt->execute();

                }
            catch(mysqli_sql_exception $e){
               throw new DAOException($e->getMessage(), $e->getCode());
            }finally{
                $mysqli->close();
            }
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
                
                $employe = new Employe2();

                $mysqli=EmployesMysqliDAO::connectTo();
                $stmt = $mysqli->prepare('SELECT * FROM emp WHERE noemp=?');
                $stmt->bind_param('i', $noemp);
                $stmt->execute();
                $rs = $stmt->get_result();
                $data = $rs->fetch_array(MYSQLI_ASSOC);
                $employe->setNoemp($data["noemp"])->setNom($data["nom"])->setPrenom($data["prenom"])->setEmploi($data["emploi"])->setSup($data["sup"])->setEmbauche($data["embauche"])->setSal($data["sal"])->setComm($data["comm"])->setNoserv($data["noserv"]);
                $mysqli->close();
                return $employe;
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