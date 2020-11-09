<?php

    class ServiceMysqliDAO{

        // Connecte à la base de données
        static function connectTo(){

            $mysqli = new mysqli('localhost', 'mathiasderache', 'mathiasderache', 'gestion_employes');
            return $mysqli;
        }

        // Recherche le tableau des services
        static function rechercheService(){
            
            $mysqli=ServiceMysqliDAO::connectTo();
            mysqli_query($mysqli, 'SELECT * FROM serv');
            $serv = mysqli_query($mysqli, 'SELECT * FROM serv');
            $row = mysqli_fetch_all($serv, MYSQLI_ASSOC);
            return $row;
            
        }
        // affiche le tableau des services
        static function afficherService($row){

            foreach ($row as $value) { 
                echo  "<tr>";
                echo "<td>" . $value["noserv"] . "</td>";
                echo "<td>" . $value["service"] . "</td>";
                echo "<td>" . $value["ville"] . "</td>";
                if($_SESSION["profil"] == "admin"){
                    echo '<td> <a href="../Présentation/formulaire_services.php?action=modif&NOSERV='  .$value["noserv"]  .'"><button type="button" class="btn btn-primary modif">Modifier</button></a> </td>';
                    // condition pour afficher les bouttons supprimer uniquement sur les lignes concernés
                    if(!array_search($value["noserv"], ServiceMysqliDAO::serviceEmployes())){

                            echo '<td> <a href="tableau_services.php?action=delete&NOSERV=' .$value["noserv"]   .'"><button type="button" class="btn btn-danger">SUPPR</button></a> </td>';
                    }
                }
                    echo "</tr>";
            }
                    
        }
        // ajout service
        static function add(Service2 $service2): void
        {
            $mysqli=ServiceMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("INSERT INTO serv VALUES(?,?,?)");
            $noser = $service2->getNoserv();
            $serv = $service2->getService();
            $ville = $service2->getVille();
            $stmt->bind_param('iss', $noser, $serv, $ville);
            $stmt->execute();
            $mysqli->close();
        }

        //Supprimer une ligne
        static function deleteService($thisDelete){

            $mysqli=ServiceMysqliDAO::connectTo();
            $stmt=$mysqli->prepare('DELETE FROM serv WHERE noserv = ?');
            $stmt->bind_param("i", $thisDelete);
            $stmt->execute();
            $mysqli->close();
        }


        // recherche d'un service
        static function rechercheUnService($noserv){

            $mysqli=ServiceMysqliDAO::connectTo();
            $stmt = $mysqli->prepare('SELECT * FROM serv WHERE noserv=?');
            $stmt->bind_param('i', $noserv);
            $stmt->execute();
            $rs = $stmt->get_result();
            $data = $rs->fetch_array(MYSQLI_ASSOC);
            $mysqli->close();
            return $data;
        }

        // Modifier une ligne
        static function editService(Service2 $service2): void
        {
            $mysqli=ServiceMysqliDAO::connectTo();
            $stmt = $mysqli->prepare("UPDATE serv SET  service=?, ville=? WHERE noserv=?");
            $serv = $service2->getService();
            $ville = $service2->getVille();
            $id = $service2->getNoserv();
            $stmt->bind_param( 'ssi', $serv, $ville, $id );
            $stmt->execute();
            $mysqli->close();
        }


        // Fonction Recherche des numero de services different dans le tableau services
        static function serviceEmployes(){

            $mysqli=ServiceMysqliDAO::connectTo();
            $src=mysqli_query($mysqli , 'SELECT DISTINCT noserv FROM emp');
            $i = 1;
            while ($row = mysqli_fetch_array($src, MYSQLI_ASSOC)){
                $array[$i] = $row["noserv"];
                $i ++;
            }
            return $array;

        }
}

?>