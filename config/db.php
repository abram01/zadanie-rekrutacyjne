<?php

    /*
    $host = 'localhost';
    $db = 'widoczni_zadanie';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    */

    
    $host = 's169.cyber-folks.pl';
    $db = 'abram01_widoczni';
    $user = 'abram01_widoczni';
    $pass = 'Widoczni2025$';
    $charset = 'utf8mb4';
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        error_log("Błąd połączenia: " . $e->getMessage());
        die("Błąd połączenia z bazą danych.");
    }

?>
