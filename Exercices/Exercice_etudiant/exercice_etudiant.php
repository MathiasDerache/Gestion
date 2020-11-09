<?php


    include_once("Personne.php");
    include_once("Etudiant.php");
    include_once("Employe.php");
    include_once("Professeur.php");

    // Creation de personne
    $personne1 = new Personne(10 , "Dujardin", "Alexis");
    $personne2 = new Personne(11 , "Dupond", "Maxime");
    $personne3 = new Personne(12 , "Durand", "Corentin");
    $personne4 = new Personne(13 , "Dufrene", "Anais");
    $personne5 = new Personne(14 , "Dutil", "Albert");
    $personne6 = new Personne(15 , "Dumand", "Theo");

    // creation etudiant 
    $etudiant1 = new Etudiant("18A1", $personne1->getId(), $personne1->getNom(), $personne1->getPrenom());
 
    $etudiant2 = new Etudiant("18A2", $personne2->getId(), $personne2->getNom(), $personne2->getPrenom());


    // Creation de deux employes
    $employe1 = new Employe(1900, $personne3->getId(), $personne3->getNom(), $personne3->getPrenom());

    $employe2 = new Employe(1900, $personne4->getId(), $personne4->getNom(), $personne4->getPrenom());


    //Creation deux professeur
    $professeur1 = new Professeur("PHP", 2100, $personne5->getId(), $personne5->getNom(), $personne5->getPrenom());

    $professeur2 = new Professeur("JavaScript", 2100, $personne6->getId(), $personne6->getNom(), $personne6->getPrenom());



    echo $etudiant1 ."\n". $etudiant2 ."\n". $employe1 ."\n". $employe2 ."\n".$professeur1 ."\n". $professeur2;
?>