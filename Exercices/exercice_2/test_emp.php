<?php

    include_once("Ouvrier.php");
    include_once("Cadre.php");
    include_once("Patron.php");

    // Creation Ouvrier Cadre Patron

    $ouvrier = new Ouvrier();
    $ouvrier->setMatricule(102)->setNom("DUMONT")->setPrenom("Sam")->setDateDeNaissance("04-04-1974")->setAnneeEmbauche(1990);
    echo "\nSalaire de  l'ouvrier 1 : ".$ouvrier->getSalaire(). "\n";
    print_r($ouvrier);

    $ouvrier_2 = new Ouvrier();
    $ouvrier_2->setMatricule(103)->setNom("DUPOND")->setPrenom("Anais")->setDateDeNaissance("01-01-1981")->setAnneeEmbauche(2001);
    echo "\nSalaire de  l'ouvrier 2 : ".$ouvrier_2->getSalaire(). "\n";
    print_r($ouvrier_2);
    
    
    $cadre = new Cadre();
    $cadre->setMatricule(101)->setNom("DURAND")->setPrenom("Eric")->setDateDeNaissance("04-04-1974")->setIndice(3);
    echo "\nSalaire du cadre 1, indice 3 : ".$cadre->getSalaire(). "\n";
    print_r($cadre);

    $patron = new Patron();
    $patron->setMatricule(100)->setNom("DUFRENE")->setPrenom("Pierre")->setDateDeNaissance("02-02-1972")->setPourcentage(30);
    echo "\nSalaire du Patron 1 avec un pourcentage de 30% : ".$patron->getSalaire(). "\n";
    print_r($patron);

?>