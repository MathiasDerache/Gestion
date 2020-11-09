<?php

    include_once("Employe.php");


    class Patron extends Employe{

        private $pourcentage;


        /**
         * Get the value of pourcentage
         */ 
        public function getPourcentage() : float
        {
                return $this->pourcentage;
        }

        /**
         * Set the value of pourcentage
         *
         * @return  self
         */ 
        public function setPourcentage(float $pourcentage) : self
        {
                $this->pourcentage = $pourcentage;

                return $this;
        }

        // Function String
        public function __toString() : string{

            return 
            "Patron :" . parent::__toString().
            "[Pourcentage] : " . $this->getPourcentage();
        }

        // Get Salaire
        public function getSalaire() : float{
            $ChiffreAffaire = 100000;
            return $ChiffreAffaire*$this->pourcentage/100;
        }
    }
?>