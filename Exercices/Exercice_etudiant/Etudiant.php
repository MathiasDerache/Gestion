<?php

    include_once("Personne.php");

    class Etudiant extends Personne{
        
        private $cne;

        // Construct
        public function __construct(string $newCne, int $newId, string $newNom, string $newPrenom){
            
            $this->cne = $newCne;
            parent::__construct($newId, $newNom, $newPrenom);
        }

        // Get cne
        public function getCne() : string{
            return $this->cne;
        }

        // Set cne
        public function setCne(string $newCne) : self{
            $this->cne = $newCne;
            return $this;
        }

        public function __toString() : string{

            return 
            "Etudiant :" . parent::__toString(). 
            "[CNE :]" . $this->cne ."\n";
        }

    }

?>