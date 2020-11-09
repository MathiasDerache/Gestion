<?php

    include_once("Personne.php");

    class Manager extends Personne{
    
        private $_service;

        public function __construct(int $id, string $prenom, string $nom, string $mail, 
                                    string $telephone, float $salaire, string $_service){
            
            parent:: __construct($id, $prenom, $nom, $mail, $telephone, $salaire);
            $this->_service = $_service;

        }

        public function affiche() : void{
            echo <<<AFFICHE
            je suis {$this->prenom} {$this->nom} je travail dans le service {$this->_service}
AFFICHE;
        }

        public function calculerSalaire() : float{

            return $this->salaire * 1.35;
       }

        /**
         * Get the value of _service
         */ 
        public function get_service() : string
        {
                return $this->_service;
        }

        /**
         * Set the value of _service
         *
         * @return  self
         */ 
        public function set_service(string $_service) : self
        {
                $this->_service = $_service;

                return $this;
        }

        // Function String
        public function __toString() : string{

            return 
            "[Id] : "  . $this->getId() .
            "[prenom] : " . $this->getPrenom() .
            "[Nom] : " . $this->getNom().
            "[Mail] : " . $this->getMail().
            "[Telephone] : " . $this->getTelephone().
            "[Salaire] : " . $this->getSalaire().
            "[Service] : " . $this->get_service();
        }
    }

?>