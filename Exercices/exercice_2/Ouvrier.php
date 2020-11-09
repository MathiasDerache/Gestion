<?php

    include_once("Employe.php");

    class Ouvrier extends Employe{

        private $anneeEmbauche;


        /**
         * Get the value of anneeEmbauche
         */ 
        public function getAnneeEmbauche() : int
        {
                return $this->anneeEmbauche;
        }

        /**
         * Set the value of anneeEmbauche
         *
         * @return  self
         */ 
        public function setAnneeEmbauche(int $anneeEmbauche) : self
        {
                $this->anneeEmbauche = $anneeEmbauche;

                return $this;
        }

        // Function String
        public function __toString() : string{

            return 
            "Ouvrier :" . parent::__toString().
            "[Salaire] : " . $this->getSMIC().
            "[Année d'Embauche] : " . $this->getAnneeEmbauche();
        }

        // Get Salaire
        public function getSalaire() : float{
            
            $salFinal = 2500 + ((2020 - $this->anneeEmbauche) *100);
            if($salFinal <= 5000){
                return $salFinal;
            }else
            return $salFinal = 5000;
        }
    }

?>