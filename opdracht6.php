<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 6</title>
</head>
<style>
    body{
        text-align: center;
        font-family: Arial;
        font-weight: bold;
        font-size: 28px;
    }
    li {
        color: #ff8400;
        font-family: "Arial Rounded MT Bold";
        list-style-type: none;
    }
</style>
<body>
<img src="img/monkey-business.jpg">
<p>Select your monkey!</p>
<img src="img/monkey_swings.png">
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$dbh = new PDO('mysql:host=localhost;port=3306;dbname=apen', 'root', 'almere77!');

if(isset($_GET['idleefgebied'])) {
    echo "idleefgebied is: ". $_GET['idleefgebied']."<br>";
    echo "omschrijving is: ". $_GET['omschrijving']."<br>";
    $sql = "insert into leefgebied (idleefgebied, omschrijving) values (:idleefgebied, :omschrijving)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([":idleefgebied" => $_GET['idleefgebied'], ":omschrijving" => $_GET['omschrijving']]);
    //echo $sql;
}

$sql = "select omschrijving, soort from leefgebied 
join aap_has_leefgebied on aap_has_leefgebied.idleefgebied = leefgebied.idleefgebied
join aap on aap.idaap = aap_has_leefgebied.idaap";
$resultaat = $dbh->query($sql);

?>
<ul>
    <?php
    foreach ($resultaat as $row) {
    print "<li>".$row['omschrijving'] . " - ".$row['soort'];
        }
    ?>
</ul>

</body>
</html>