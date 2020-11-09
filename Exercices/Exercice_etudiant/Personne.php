<?php


    class Personne{

        protected $id;
        protected $nom;
        protected $prenom;


        public function __construct(int $newId, string $newNom, string $newPrenom){
            
            $this->id = $newId; 
            $this->nom = $newNom; 
            $this->prenom = $newPrenom; 
        }


        //get / set id
        public function getId() : int{
            return $this->id;
        }

        public function setId(int $newId) : self{
            $this->id = $newId;
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

        // Function String
        public function __toString() : string{

            return 
            "[Id] : "  . $this->getId() .
            "[Nom] : " . $this->getNom() .
            "[Prenom] : " . $this->getPrenom();
        }

        
    }

?>