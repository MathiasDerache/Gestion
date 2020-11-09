<?php


    abstract class  Employe{

        private $matricule;
        private $nom;
        private $prenom;
        private $dateDeNaissance;

        
        /**
         * Get the value of matricule
         */ 
        public function getMatricule() : int 
        {
                return $this->matricule;
        }

        /**
         * Set the value of matricule
         *
         * @return  self
         */ 
        public function setMatricule(int $matricule) : self
        {
                $this->matricule = $matricule;

                return $this;
        }

        /**
         * Get the value of nom
         */ 
        public function getNom() : string
        {
                return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */ 
        public function setNom( string $nom) : self
        {
                $this->nom = $nom;

                return $this;
        }

        /**
         * Get the value of prenom
         */ 
        public function getPrenom() : string
        {
                return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */ 
        public function setPrenom(string $prenom) : self
        {
                $this->prenom = $prenom;

                return $this;
        }

        /**
         * Get the value of dateDeNaissance
         */ 
        public function getDateDeNaissance() : string
        {
                return $this->dateDeNaissance;
        }

        /**
         * Set the value of dateDeNaissance
         *
         * @return  self
         */ 
        public function setDateDeNaissance(string $dateDeNaissance) : self
        {
                $this->dateDeNaissance = $dateDeNaissance;

                return $this;
        }

        // Function String
        public function __toString() : string{

            return 
            "[Matricule] : "  . $this->getMatricule() .
            "[Nom] : " . $this->getNom() .
            "[Prenom] : " . $this->getPrenom().
            "[Date de Naissance] : " . $this->getDateDeNaissance();
        }

        // Get Salaire
        public abstract function getSalaire() : float;
    }

?>