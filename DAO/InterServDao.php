
<?php
include_once('../Métier/Service2.php');

//interface employé

interface InterEmpDao{

    public function add(Employe2 $employe): void;
    public function editService(Employe2 $employe): void;
    public function deleteService(int $id): void;
    public function rechercheUnService(int $id): Employe2;
    public function rechercheService(): array;
}