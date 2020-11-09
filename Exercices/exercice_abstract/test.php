<?php


    include_once("Personne.php");
    include_once("Developpeur.php");
    include_once("Manager.php");

    $developpeur_1 = new Developpeur(1, "Jacques", "DUPOND", "dd@dd.fr", "0610101010", 2100, "PHP");
    $developpeur_2 = new Developpeur(2, "Henri", "DURAND", "henri@dd.fr", "0611111111", 2100, "JavaScript");


    $manager_1 = new Manager(3, "Kevin", "DUFRENE", "keke@dd.fr", "0612121212", 2700,  "Informatique");
    $manager_2 = new Manager(4, "Robert", "DUFOND", "Rob@dd.fr", "0613131313", 2700,  "Vente");


    echo "\n Le salaire du manager " .$manager_1->getNom() ." " . $manager_1->getPrenom() ." et de " . $manager_1->calculerSalaire() ."€, son service est : "
            . $manager_1->get_service(). ", Counter : ". Personne::$counter. "\n";

    echo "\n Le salaire du developpeur " .$developpeur_1->getNom() ." " . $developpeur_1->getPrenom() ." et de " . $developpeur_1->calculerSalaire() .
            "€, sa specialité est : ". $developpeur_1->get_specialite() . ", Counter : ".Personne::$counter. "\n";
    
    echo " ";

?>
