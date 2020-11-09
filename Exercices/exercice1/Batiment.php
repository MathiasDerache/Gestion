<?php


    class Batiment{

        private $adresse;
        private $superficie;
        
        //construct
        public function __construct(string $adresse){
            $this->adresse = $adresse;
        }

        //get / set adresse
        public function getAdresse() : string{
            return $this->adresse;
        }

        public function setAdresse(string $newAdresse) : self{
            $this->adresse = $newAdresse;
            return $this;
        }

        // get / set superficie
        public function getSuperficie() : float{
            return $this->superficie;
        }

        public function setSuperficie(float $newSuperficie) : self{
            $this->superficie = $newSuperficie;
            return $this;
        }

        // to string
        public function __toString() :string
        {
            return
            " [Adresse] :" . $this->adresse . 
            " [Superficie] :" . $this->superficie;
        }
    }


?>