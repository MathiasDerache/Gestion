<?php

    class Service{

        private $noserv;
        private $service;
        private $ville;

        // get / set noserv
        public function getNoserv() : Int{
            return $this->noserv;
        }

        public function setNoserv(int $newNoserv) : self{
            $this->noserv = $newNoserv;
            return $this;
        }

        // get / set service
        public function getService() : string{
            return $this->service;
        }

        public function setService(string $newService) : self{
            $this->service = $newService;
            return $this;
        }

        // get / set ville
        public function getVille() : string{
            return $this->ville;
        }

        public function setVille(string $newVille) : self{
            $this->ville = $newVille;
            return $this;
        }

        // To string
        public function __toString() :string
        {
            return
            " [Noserv] :" . $this->noserv . 
            " [Service] :" . $this->service .
            " [Ville] :" . $this->ville;
        }
    }

?>