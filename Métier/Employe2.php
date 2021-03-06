<?php
    include_once('Objet.php');
    class Employe2 extends Objet{

        private $noemp;
        private $nom;
        private $prenom;
        private $emploi;
        private $sup;
        private $embauche;
        private $sal;
        private $comm;
        private $noserv;

        //Constructeur par defaut

        /**
         * Get the value of noemp
         */
        public function getNoemp(): int
        {
            return $this->noemp;
        }

        /**
         * Set the value of noemp
         *
         * @return  self
         */
        public function setNoemp(int $noemp): self
        {
            $this->noemp = $noemp;

            return $this;
        }

        /**
         * Get the value of nom
         */
        public function getNom(): string
        {
            return $this->nom;
        }

        /**
         * Set the value of nom
         *
         * @return  self
         */
        public function setNom(string $nom): self
        {
            $this->nom = $nom;

            return $this;
        }

        /**
         * Get the value of prenom
         */
        public function getPrenom(): string
        {
            return $this->prenom;
        }

        /**
         * Set the value of prenom
         *
         * @return  self
         */
        public function setPrenom(string $prenom): self
        {
            $this->prenom = $prenom;

            return $this;
        }

        /**
         * Get the value of emploi
         */
        public function getEmploi(): string
        {
            return $this->emploi;
        }

        /**
         * Set the value of emploi
         *
         * @return  self
         */
        public function setEmploi(string $emploi): self
        {
            $this->emploi = $emploi;

            return $this;
        }

        /**
         * Get the value of sup
         */
        public function getSup(): ?int
        {
            return $this->sup;
        }

        /**
         * Set the value of sup
         *
         * @return  self
         */
        public function setSup(?int $sup): self
        {
            $this->sup = $sup;

            return $this;
        }

        /**
         * Get the value of embauche
         */
        public function getEmbauche(): string
        {
            return $this->embauche;
        }

        /**
         * Set the value of embauche
         *
         * @return  self
         */
        public function setEmbauche(string $embauche): self
        {
            $this->embauche = $embauche;

            return $this;
        }

        /**
         * Get the value of sal
         */
        public function getSal(): ?float
        {
            return $this->sal;
        }

        /**
         * Set the value of sal
         *
         * @return  self
         */
        public function setSal(?float $sal): self
        {
            $this->sal = $sal;

            return $this;
        }

        /**
         * Get the value of comm
         */
        public function getComm(): ?float
        {
            return $this->comm;
        }

        /**
         * Set the value of comm
         *
         * @return  self
         */
        public function setComm(?float $comm): self
        {
            $this->comm = $comm;

            return $this;
        }

        /**
         * Get the value of noserv
         */
        public function getNoserv(): int
        {
            return $this->noserv;
        }

        /**
         * Set the value of noserv
         *
         * @return  self
         */
        public function setNoserv(int $noserv): self
        {
            $this->noserv = $noserv;

            return $this;
        }

    }
