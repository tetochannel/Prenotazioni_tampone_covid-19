<?php

ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$dbname = 'prenotazioni_tampone_covid-19';

$user = 'root';
$password = '';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$pdo = new PDO($dsn, $user, $password);

$sql = "SELECT * FROM `prenotazioni_tampone_covid-19`.prenotazioni";

$stmt = $pdo->query($sql);

//Decisione "Sporca" {
echo "<pre>";
var_dump($stmt->fetchAll());
echo "</pre>";
// }