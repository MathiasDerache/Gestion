
<?php
include_once('../Métier/Employes2.php');

//interface employé

interface InterEmpDao{

    public function addEmploye(Employe2 $employe): void;
    public function editEmploye(Employe2 $employe): void;
    public function deleteEmployes(int $id): void;
    public function rechercheUnEmploye(int $id): Employe2;
    public function rechercheEmployes(): array;
}