<?php

    include_once("Employe.php");

    class Professeur extends Employe{
        
        protected $specialite;

        // Construct
        public function __construct(string $newSpecialite, int $newSalaire, int $newId, string $newNom, string $newPrenom){
            
            $this->specialite = $newSpecialite;
            parent::__construct($newSalaire, $newId, $newNom, $newPrenom);
        }

        // Get specialite
        public function getSpecialite() : string{
            return $this->specialite;
        }

        // Set specialite
        public function setSpecialite(string $newSpecialite) : self{
            $this->specialite = $newSpecialite;
            return $this;
        }

        public function __toString() : string{

            return 
            "Professeur :" . parent::__toString(). 
            "[Specialite :]" . $this->specialite ."\n";
        }

    }

?>