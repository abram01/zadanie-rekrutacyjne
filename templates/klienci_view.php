<?php

    require_once __DIR__ . '/../config/baza_danych.php';
    require_once __DIR__ . '/../src/RepozytoriumKlientow.php';
    require_once __DIR__ . '/../src/FunkcjePomocnicze.php';

    $repo = new RepozytoriumKlientow($pdo);
    $wyniki = $repo->pobierzWszystkichZOpiekunami();
    $klienci = grupujPoKliencie($wyniki);

?>
<!doctype html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Widoczni - Klienci</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

</head>

<body>
    <main class="container py-5">
        <h1 class="mb-4">Lista klientów</h1>
        <?php include __DIR__ . '/../templates/widok_klienci.php'; ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script src="/assets/js/sidebars.js"></script>
    <script src="/assets/js/tabela.js"></script>
</body>

</html>
