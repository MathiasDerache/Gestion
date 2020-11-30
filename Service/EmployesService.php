<?php
    include("../DAO/EmployesMysqliDAO.php");
    require("ServiceException.php");
    class EmployesService extends EmployesMysqliDAO{


        public function addEmp($employe){
            try{
            EmployesMysqliDAO::addEmploye($employe);
            }
            catch(DAOException $de){
                throw new ServiceException($de->getMessage(), $de->getCode());
            }
        }


        public function editEmp($employe){
            try{
                EmployesMysqliDAO::editEmploye($employe);
            }catch(DAOException $de){
                throw new ServiceException($de->getMessage(), $de->getCode());
            }
        }

        public function deleteEmp($thisDelete){
            EmployesMysqliDAO::deleteEmployes($thisDelete);
     
        }

        public function count(){
           return EmployesMysqliDAO::count();
        }
    }
?> 