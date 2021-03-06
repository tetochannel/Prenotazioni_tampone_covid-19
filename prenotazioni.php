<?php


// Dice a livello dello script di mostrare gli errori e non loggari, come
// succederebbe nel normale funzionamento del programa, solo a scopo di
// debug durante lo sviluppo

ini_set('display_errors', 1);
ini_set('log_errors', 0);

$host = 'localhost';
$dbname = 'prenotazioni_tampone_covid-19';
$user = 'root';
$password = '';

$codice_fiscale = 'prova';
$giorno = '2021-06-03';

$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$pdo = new PDO($dsn, $user, $password);
                                                                                                // Sono i segna posto, posso avere lo stesso nome delle variabili che rappresentano ma NON fanno riferimento alla stessa cosa (non sono la stessa cosa)
$sql = "INSERT INTO `prenotazioni_tampone_covid-19`.prenotazioni (codice_fiscale, giorno) values (:C_F, :G)";

// Con questa istruzione viene inviata la query al database che però non esegue subito ma la memorizza
$stmt = $pdo->prepare($sql);

// Inviamo i dati al database che verranno sostituiti ai segna posto della query in modo tale che gestisca lui le protezioni da eventali attacchi di sql injection

$stmt->execute(
    [
        'C_F' => $codice_fiscale,
        'G' => $giorno
    ]
);