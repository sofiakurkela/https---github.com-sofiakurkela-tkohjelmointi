<?php
require "dbconnection.php";
$dbcon = createDbConnection();

// Lisää johonkin tauluun kaksi uutta riviä koodilla.

$sql = "INSERT INTO henk (snimi, htun, kunta, svuosi, palkka) VALUES
('Heikkinen', '3456', 'Oulu', '1946', '2900'),
('Virtanen', '5678', 'Tampere', '1978', '4900');";

$dbcon->exec($sql);

try {
    $dbcon = new PDO("mysql:host=$host;dbname=$db", $username, $pw);
    return $dbcon;
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Lisää edelliseen tehtävään ominaisuus, että tiedot saadaan jollain tavalla parametreina tiedostoon (POST-toiminto)

 if(!isset($_POST["kunta"]) || !isset($_POST["palkka"])){
     echo "Virhe!";
    exit;
 }

echo "<h2>".$_POST["kunta"]."</h2>";
echo $_POST["palkka"];

