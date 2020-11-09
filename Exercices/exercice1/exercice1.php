<?php


    include_once("Maison.php");
    include_once("Batiment.php");

    $batiment = new Batiment("Rue de Roubaix");
    $batiment->setSuperficie(100);

    $maison = new Maison($batiment->getAdresse(), $batiment->getSuperficie(), 4);
    
    
    echo $batiment ."\n". $maison;

?>