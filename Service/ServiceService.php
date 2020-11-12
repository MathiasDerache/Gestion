<?php
    include("../DAO/ServiceMysqliDAO.php");
    class ServiceService extends ServiceMysqliDAO{

        public function addServ($service2){
            ServiceMysqliDAO::add($service2);
        }


        public function editServ($service2){
            ServiceMysqliDAO::editService($service2);
        }

        public function deleteServ($thisDelete){
            ServiceMysqliDAO::deleteService($thisDelete);
        }
    }
?>