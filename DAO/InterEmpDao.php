
<?php
include_once('../Métier/Employe2.php');

//interface employé

interface InterEmpDao{
    public static function addEmploye(Employe2 $employe): void;
    public static function editEmploye(Employe2 $employe): void;
    public static function deleteEmployes(Employe2 $id);
    public static function rechercheUnEmploye( $id);
    public static function rechercheEmployes();
}