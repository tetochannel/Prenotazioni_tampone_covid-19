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

$codice_fiscale = $_POST['codice_fiscale'];
$giorno = $_POST['giorno'];


$dsn = 'mysql:host='.$host.';dbname='.$dbname;

$pdo = new PDO($dsn, $user, $password);
                                                                                                // Sono i segna posto, posso avere lo stesso nome delle variabili che rappresentano ma NON fanno riferimento alla stessa cosa (non sono la stessa cosa)
$sql = "INSERT INTO `prenotazioni_tampone_covid-19`.prenotazioni (codice_fiscale, giorno) values (:codice_fiscale, :giorno)";

// Con questa istruzione viene inviata la query al database che però non esegue subito ma la memorizza, aspettando che venga richiesto di eseguirla tramite il richiamo della funzione execute
$stmt = $pdo->prepare($sql);

// Inviamo i dati al database che verranno sostituiti ai segna posto della query in modo tale che gestisca lui le protezioni da eventali attacchi di sql injection

$stmt->execute(
    [
        'codice_fiscale' => $codice_fiscale,
        'giorno' => $giorno
    ]
);

// In generale il deployment è il processo per cui si configura/installa/monta (es. infrastrutture di macchine)/fornisce
// il risultato finale al cliente se per esempio
// ci ha richiesto un software oppure mettendolo sul server se abbiamo realizzato un back end in php come in questo caso
// Essendo che il sever lo proproniamo in locale grazie ad apache (XAMPP), il processo di deployment farà in modo di
// fare una copia distinta nella root del server (che in questo caso è sempre appunto locale C:/xampp/htdocs;
// Nella realtà sarebbe ovviamente sul server). In questo esempio, con questi strumenti e queste configurazioni,
// bisognerà fare il deployment ogni volta per poter applicare delle modifiche fatte su questo file
// Per configurare questo processo basta andare in Tools/Deployment/Configuration


//Simulazione richieste post: Tools/Http Client/Test RESTful Web Service