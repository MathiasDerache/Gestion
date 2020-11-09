<?php

    class Employes {

        private $noemp;
        private $nom;
        private $prenom;
        private $emploi;
        private $sup;
        private $embauche;
        private $sal;
        private $comm;
        private $noserv;
        
        //get / set noemp
        public function getNoemp() : int{
            return $this->noemp;
        }

        public function setNoemp(int $newNoemp) : self{
            $this->noemp = $newNoemp;
            return $this;
        }

        // get / set nom
        public function getNom() : string{
            return $this->nom;
        }

        public function setNom(string $newNom) : self{
            $this->nom = $newNom;
            return $this;
        }

        // get / set prenom
        public function getPrenom() : string{
            return $this->prenom;
        }

        public function setPrenom(string $newPrenom) : self{
            $this->prenom = $newPrenom;
            return $this;
        }

        // get / set emploi
        public function getEmploi() : string{
            return $this->emploi;
        }

        public function setEmploi(string $newEmploi) : self{
            $this->emploi = $newEmploi;
            return $this;
        }

        // get / set sup
        public function getSup() : Int{
            return $this->sup;
        }

        public function setSup(int $newSup) : self{
            $this->sup = $newSup;
            return $this;
        }
        

        // get / set embauche
        public function getEmbauche() : String{
            return $this->embauche;
        }

        public function setEmbauche(String $newEmbauche) : self{
            $this->embauche = $newEmbauche;
            return $this;
        }
        
        // get / set sal
        public function getSal() : Int{
            return $this->sal;
        }

        public function setSal(Int $newSal) : self{
            $this->sal = $newSal;
            return $this;
        }

        // get / set comm
        public function getComm() : Int{
            return $this->comm;
        }

        public function setComm(Int $newComm) : self{
            $this->comm = $newComm;
            return $this;
        }


        // get / set noserv
        public function getNoserv() : Int{
            return $this->noserv;
        }

        public function setNoserv(Int $newNoserv) : self{
            $this->noserv = $newNoserv;
            return $this;
        }
        
        // To string
        public function __toString() :string
        {
            return
            " [Noemp] :" . $this->noemp . 
            " [Nom] :" . $this->nom .
            " [Prenom] :" . $this->prenom .
            " [Emploi] :" . $this->emploi .
            " [Sup] :" . $this->sup .
            " [Embauche] :" . $this->embauche .
            " [Sal] :" . $this->sal .
            " [Comm] :" . $this->comm .
            " [Noserv] :" . $this->noserv;
        }
    }

?>