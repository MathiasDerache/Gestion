<?php

    include_once("Personne.php");

    class Employe extends Personne{
        
        protected $salaire;

        // Construct
        public function __construct(int $newSalaire, int $newId, string $newNom, string $newPrenom){
            
            $this->salaire = $newSalaire;
            parent::__construct($newId, $newNom, $newPrenom);
        }

        // Get salaire
        public function getSalaire() : int{
            return $this->salaire;
        }

        // Set salaire
        public function setSalaire(string $newSalaire) : self{
            $this->salaire = $newSalaire;
            return $this;
        }

        public function __toString() : string{

            return 
            "Employe :" . parent::__toString(). 
            "[Salaire :]" . $this->salaire ."\n";
        }

    }

?>