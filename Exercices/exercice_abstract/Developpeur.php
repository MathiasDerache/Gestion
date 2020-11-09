<?php

    include_once("Personne.php");

    class Developpeur extends Personne{

        private $_specialite;


        public function __construct(int $id, string $prenom, string $nom, string $mail, 
                                    string $telephone, float $salaire, string $_specialite){

            parent:: __construct($id, $prenom, $nom, $mail, $telephone, $salaire);
            $this->_specialite = $_specialite;
        }

        public function affiche() : string{
            return <<<AFFICHE
            je suis {$this->prenom} {$this->nom} je suis developpeur  {$this->_specialite}
AFFICHE;
        }

        public function calculerSalaire() : float{

             return $this->salaire * 1.2;
        }


        /**
         * Get the value of _specialite
         */ 
        public function get_specialite() : string
        {
                return $this->_specialite;
        }

        /**
         * Set the value of _specialite
         *
         * @return  self
         */ 
        public function set_specialite( string $_specialite) : self
        {
                $this->_specialite = $_specialite;

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
            "[Specialite] : " . $this->get_specialite();
        }


    }

?>