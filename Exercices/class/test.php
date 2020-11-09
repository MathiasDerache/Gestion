<?php

    include_once('Employes.php');
    include_once('Service.php');

    // Création de deux nouveaux services
    $service = new Service();
    $service->setNoserv(8)->setService("INSTRUCTION")->setVille("LILLE");

    $service2 = new Service();
    $service2->setNoserv(9)->setService("APPLICATION")->setVille("LYON");


    // Création de 4 nouveaux employés
    $employes = new Employes();
    $employes->setNoemp(1080)->setNom("DUPOND")->setPrenom("Henri")->setEmploi("Vendeur")->setSup(1000)->setEmbauche("1992-10-08")->setSal(6000)->setComm(0)->setNoserv($service2->getNoserv());

    $employes2 = new Employes();
    $employes2->setNoemp(1081)->setNom("DURAND")->setPrenom("Simon")->setEmploi("TECHNICIEN")->setSup(1000)->setEmbauche("1992-05-05")->setSal(5000)->setComm(0)->setNoserv($service->getNoserv());
    
    $employes3 = new Employes();    
    $employes3->setNoemp(1082)->setNom("DUPRES")->setPrenom("Helene")->setEmploi("VENDEUSE")->setSup(1000)->setEmbauche("1992-06-08")->setSal(6000)->setComm(0)->setNoserv($service2->getNoserv());
    
    $employes4 = new Employes();    
    $employes4->setNoemp(1083)->setNom("DUMONT")->setPrenom("Simone")->setEmploi("TECHNICIENNE")->setSup(1000)->setEmbauche("1992-08-10")->setSal(5000)->setComm(0)->setNoserv($service->getNoserv());
    
    
    // Affichage des nouveaux employés et des nouveaux services
    echo $employes ."\n" . $employes2 ."\n" . $employes3 ."\n" . $employes4 ."\n" . $service ."\n" . $service2;
?>