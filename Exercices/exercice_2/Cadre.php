<?php

    include_once("Employe.php");

    class Cadre extends Employe{

        private $indice;



        /**
         * Get the value of indice
         */ 
        public function getIndice() : int
        {
                return $this->indice;
        }

        /**
         * Set the value of indice
         *
         * @return  self
         */ 
        public function setIndice(int $indice) : self
        {
                $this->indice = $indice;

                return $this;
        }

        // Function String
        public function __toString() : string{

            return 
            "Cadre :" . parent::__toString().
            "[Indice] : " . $this->getIndice();
        }

        // Get Salaire
        public  function getSalaire() : float{

            if($this->indice == 1 ){
                return 13000;
            }elseif( $this->indice == 2 ){
                return 15000;
            }elseif( $this->indice == 3 ){
                return 17000;
            }else{
                return 20000;
            }
        }
    }


?>