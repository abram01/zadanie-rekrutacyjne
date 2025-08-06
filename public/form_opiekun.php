<?php
require_once __DIR__ . '/../config/db.php';

$mode = $_GET['mode'] ?? 'add';
$opiekunId = $_GET['id'] ?? null;
$data = date('Y-m-d H:i:s');
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'nieznany';

// Tytuł
if ($mode === 'edit') {
    $tytul = 'Edytuj opiekuna';
} elseif ($mode === 'preview') {
    $tytul = 'Podgląd opiekuna';
} else {
    $tytul = 'Dodaj opiekuna';
}

// Domyślne dane
$opiekun = [
    'nazwa' => '',
    'status' => '',
    'dodatkowe_info' => ''
];

// Pobierz dane opiekuna (w edycji lub podglądzie)
if (($mode === 'edit' || $mode === 'preview') && $opiekunId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM opiekunowie WHERE id = ?");
        $stmt->execute([$opiekunId]);
        $opiekun = $stmt->fetch();

        if (!$opiekun) {
            die("Nie znaleziono opiekuna o podanym ID.");
        }
    } catch (PDOException $e) {
        error_log("Błąd odczytu opiekuna: " . $e->getMessage());
        die("Wystąpił błąd podczas odczytu danych opiekuna.");
    }
}

// Zapis opiekuna (jeśli nie podgląd)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mode !== 'preview') {
    $nazwa   = $_POST['opiekunName'] ?? '';
    $status  = $_POST['opiekunStatus'] ?? '';
    $info    = $_POST['opiekunInfo'] ?? '';

    if ($mode === 'edit' && $opiekunId) {
        try {
            $stmt = $pdo->prepare("UPDATE opiekunowie 
                SET nazwa = ?, status = ?, dodatkowe_info = ?, data_edycji = ?, ostatnia_modyfikacja = ?
                WHERE id = ?");
            $stmt->execute([$nazwa, $status, $info, $data, $ip, $opiekunId]);

            header("Location: ../public/opiekun.php");
            exit;
        } catch (PDOException $e) {
            error_log("Błąd edycji opiekuna: " . $e->getMessage());
            die("Wystąpił błąd podczas edycji opiekuna.");
        }
    } else {
        try {
            $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'opiekunowie'");
            $stmt->execute();
            $gen = $stmt->fetch();

            $nowyNumer = $gen['ostatni_numer'] + 1;
            $newOpiekunId = sprintf("%s-%06d", $gen['prefix'], $nowyNumer);
            $pdo->prepare("UPDATE id_generator SET ostatni_numer = ? WHERE typ = 'opiekunowie'")
                ->execute([$nowyNumer]);

            $stmt = $pdo->prepare("INSERT INTO opiekunowie 
                (id, data_utworzenia, data_edycji, ostatnia_modyfikacja, nazwa, status, dodatkowe_info)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$newOpiekunId, $data, $data, $ip, $nazwa, $status, $info]);

            header("Location: ../public/opiekun.php");
            exit;
        } catch (PDOException $e) {
            error_log("Błąd zapisu opiekuna: " . $e->getMessage());
            die("Wystąpił błąd zapisu nowego opiekuna.");
        }
    }
}

// Generuj ID w trybie dodawania
if ($mode === 'add') {
    try {
        $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'opiekunowie'");
        $stmt->execute();
        $gen = $stmt->fetch();
        $proponowaneId = sprintf("%s-%06d", $gen['prefix'], $gen['ostatni_numer'] + 1);
    } catch (PDOException $e) {
        error_log("Błąd generowania ID opiekuna: " . $e->getMessage());
        $proponowaneId = 'BŁĄD';
    }
}

include __DIR__ . '/../templates/naglowek.php';
include __DIR__ . '/../templates/sidebar.php';
include __DIR__ . '/../templates/form_add_opiekun.php';
include __DIR__ . '/../templates/stopka.php';
