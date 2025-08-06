<?php
require_once '../src/repozytorium_ustawienia.php';
require_once '../config/db.php';

$repozytorium = new RepozytoriumUstawien($pdo);
$liczniki = $repozytorium->pobierzLiczniki();


include __DIR__ . '/../templates/naglowek.php';
include __DIR__ . '/../templates/sidebar.php';
include __DIR__ . '/../templates/tabela_ustawienia.php';
include __DIR__ . '/../templates/stopka.php';

?>



