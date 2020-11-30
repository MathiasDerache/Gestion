<?php
    include("../DAO/ServiceMysqliDAO.php");
    require("ServiceException.php");
    class ServiceService extends ServiceMysqliDAO{

        public function addServ($service2){
            try{
                ServiceMysqliDAO::add($service2);
            }catch(DAOException $de){
                throw new ServiceException($de->getMessage(), $de->getCode());
            }
        }


        public function editServ($service2){
            try{
                ServiceMysqliDAO::editService($service2);
            }catch(DAOException $de){
                throw new ServiceException($de->getMessage(), $de->getCode());
            }
        }

        public function deleteServ($thisDelete){
            ServiceMysqliDAO::deleteService($thisDelete);
        }
    }
?>