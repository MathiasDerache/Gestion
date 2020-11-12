<?php
    include("../DAO/EmployesMysqliDAO.php");
    class EmployesService extends EmployesMysqliDAO{


        public function addEmp($employe){
            EmployesMysqliDAO::addEmploye($employe);
        }


        public function editEmp($employe){
            EmployesMysqliDAO::editEmploye($employe);
        }

        public function deleteEmp($thisDelete){
            EmployesMysqliDAO::deleteEmployes($thisDelete);
        }
    }
?>