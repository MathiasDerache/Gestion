<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
    $db = new mysqli('localhost', 'mathiasderache', 'mathiasderache', 'gestion_employes');
}
catch(mysqli_sql_exception $e){
        echo 'code : '. $e->getCode() . ', message : ' . $e->getMessage();
}
