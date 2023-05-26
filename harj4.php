<?php
require "dbconnection.php";
$dbcon = createDbConnection();

// Lisää tai päivitä transaktiona ainakin kahden eri taulun tietoa.
// päivitetään P1 = P8 ja P2 = P7

$projektitunnus1 = "P8";
$projektitunnus2 = "P7";

try{
    $dbcon->beginTransaction();

    $statement = $dbcon->prepare("UPDATE proj SET ptun=ptun+? WHERE ptun=?");
    
    $statement->execute(array($projektitunnus1, "P8"));

    $statement->execute(array($projektitunnus2, "P7"));

    $dbcon->commit();

}catch(Exception $e){

    $dbcon->rollBack();

    echo $e->getMessage();
}