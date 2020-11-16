
<?php
include_once('../Métier/Service2.php');

//interface employé

interface InterServDao{

    public static function add(Service2 $employe): void;
    public static function editService(Servcie2 $employe): void;
    public static function deleteService(Service2 $id);
    public static function rechercheUnService($id);
    public static function rechercheService();
}