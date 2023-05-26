<?php
require "dbconnection.php";
$dbcon = createDbConnection();

// Hae jostain taulusta kahdella eri hakuehdolla tietoja (sama sql-komento). (Esim. asiakkaat jotka alkavat a-kirjaimella ja ovat tietystä kaupungista, mutta älä käytä juuri tätä esimerkkiä). Hakuarvot tulee olla koodissa muuttujina ja ne annetaan parametreina queryyn. Palauta haun tulokset responsena (esim. json).
// hae ensimmäinen projektitunnus (ptun) ja kaikki henkilöt (htun), jotka työskentelevät siinä

$sql = "SELECT * FROM prhe";
$statement = $dbcon->prepare($sql);
$statement->execute();

$resp = new stdClass();
$resp->$ptunRow = "ptun";
$resp->$htun = "htun";

$ptunRow = $statement->fetch(PDO::FETCH_ASSOC);
$ptun = $ptunRow["ptun"];

$sql = "SELECT htun FROM prhe";
$statement = $dbcon->prepare($sql);
$statement->execute();

$htuns =  $statement->fetchAll(PDO::FETCH_COLUMN);

$json = json_encode($resp);
header('Content-type: application/json');

echo $json;

// echo "<h3>".$ptunRow["htun"]."</h3>";

foreach($htuns as $htun){
    echo $htun;
}
