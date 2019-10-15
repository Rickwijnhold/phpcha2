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
$leefgebied = $dbh->query('SELECT * from leefgebied');
$apen = $dbh->query('SELECT * from aap');

?>
<ul>
    <?php
    foreach ($leefgebied as $leef) {
        echo "<li>".$leef['idleefgebied']." - ".$leef['omschrijving']."</li>";
    }
    foreach ($apen as $aap) {
        echo "<li class='tabel'>".$aap['idaap']." - ".$aap['soort']."</li>";
    }
    ?>
</ul>

</body>
</html>