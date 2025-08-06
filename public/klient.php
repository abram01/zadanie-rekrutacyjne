<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/repozytorium_klientow.php';
require_once __DIR__ . '/../src/grupowanie.php';

$repo = new RepozytoriumKlientow($pdo);
$wyniki = $repo->pobierzWszystkichZOpiekunami();
$klienci = grupujPoKliencie($wyniki);

$tytul = "Klienci - widoczni";

include __DIR__ . '/../templates/naglowek.php';
include __DIR__ . '/../templates/sidebar.php';
include __DIR__ . '/../templates/tabela_klienci.php';
include __DIR__ . '/../templates/popup_opiekun.php'; 
include __DIR__ . '/../templates/stopka.php';