<?php

    include_once('Batiment.php');

    class Maison extends Batiment{

        private $nbPieces;


        //construct
        public function __construct(string $adresse, float $superficie, int $nbPieces){
            $this->adresse = $adresse;
            $this->superficie = $superficie;
            $this->nbPieces = $nbPieces;

        }

        // get / set nbPieces
        public function getNbPieces() : int{
            return $this->nbPieces;
        }

        public function setNbPieces(int $newNbPieces) : self{
            $this->nbPieces = $newNbPieces;
            return $this;
        }

        // To string
        public function __toString() :string
        {
            return
            " [Adresse] :" . $this->adresse . 
            " [Superficie] :" . $this->superficie .
            " [NbPieces] :" . $this->nbPieces;
        }

    }


?>