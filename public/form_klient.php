<?php
require_once __DIR__ . '/../config/db.php';

$mode = $_GET['mode'] ?? 'add';
$klientId = $_GET['id'] ?? null;
$data = date('Y-m-d H:i:s');
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'nieznany';

// Ustal tytuł
if ($mode === 'edit') {
    $tytul = 'Edytuj klienta';
} elseif ($mode === 'preview') {
    $tytul = 'Podgląd klienta';
} else {
    $tytul = 'Dodaj klienta';
}

// Domyślne dane
$klient = [
    'nazwa' => '',
    'status' => '',
    'komentarz' => ''
];
$przypisaniOpiekunowie = [];

// Pobierz dane klienta w trybie edycji lub podglądu
if (($mode === 'edit' || $mode === 'preview') && $klientId) {
    try {
        $stmt = $pdo->prepare("SELECT * FROM klienci WHERE id = ?");
        $stmt->execute([$klientId]);
        $klient = $stmt->fetch();

        if (!$klient) {
            die("Nie znaleziono klienta o podanym ID.");
        }

        $stmt = $pdo->prepare("SELECT id_opiekun FROM relacje_opiekun_klient WHERE id_klient = ?");
        $stmt->execute([$klientId]);
        $przypisaniOpiekunowie = $stmt->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $e) {
        error_log("Błąd odczytu klienta: " . $e->getMessage());
        die("Wystąpił błąd podczas odczytu danych klienta.");
    }
}

// Zapis (jeśli nie jesteśmy w trybie preview)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $mode !== 'preview') {
    $nazwa       = $_POST['clientName'] ?? '';
    $status      = $_POST['clientStatus'] ?? '';
    $komentarz   = $_POST['clientComment'] ?? '';
    $opiekunowie = $_POST['guardians'] ?? [];

    if ($mode === 'edit' && $klientId) {
        try {
            $stmt = $pdo->prepare("UPDATE klienci 
                SET nazwa = ?, status = ?, komentarz = ?, data_edycji = ?, ostatnia_modyfikacja = ? 
                WHERE id = ?");
            $stmt->execute([$nazwa, $status, $komentarz, $data, $ip, $klientId]);

            $pdo->prepare("DELETE FROM relacje_opiekun_klient WHERE id_klient = ?")->execute([$klientId]);

            foreach ($opiekunowie as $opiekun_id) {
                $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'relacja'");
                $stmt->execute();
                $relGen = $stmt->fetch();
                $relId  = sprintf("%s-%06d", $relGen['prefix'], $relGen['ostatni_numer'] + 1);
                $pdo->prepare("UPDATE id_generator SET ostatni_numer = ? WHERE typ = 'relacja'")
                    ->execute([$relGen['ostatni_numer'] + 1]);

                $stmt = $pdo->prepare("INSERT INTO relacje_opiekun_klient 
                    (id, data_utworzenia, data_edycji, ostatnia_modyfikacja, id_klient, id_opiekun)
                    VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$relId, $data, $data, $ip, $klientId, $opiekun_id]);
            }

            header("Location: ../public/klient.php");
            exit;
        } catch (PDOException $e) {
            error_log("Błąd edycji: " . $e->getMessage());
            die("Wystąpił błąd podczas edycji klienta.");
        }

    } else {
        try {
            $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'klienci'");
            $stmt->execute();
            $gen = $stmt->fetch();
            $nowyNumer = $gen['ostatni_numer'] + 1;
            $newClientId = sprintf("%s-%06d", $gen['prefix'], $nowyNumer);
            $pdo->prepare("UPDATE id_generator SET ostatni_numer = ? WHERE typ = 'klienci'")
                ->execute([$nowyNumer]);

            $stmt = $pdo->prepare("INSERT INTO klienci 
                (id, data_utworzenia, data_edycji, ostatnia_modyfikacja, nazwa, status, komentarz)
                VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$newClientId, $data, $data, $ip, $nazwa, $status, $komentarz]);

            foreach ($opiekunowie as $opiekun_id) {
                $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'relacja'");
                $stmt->execute();
                $relGen = $stmt->fetch();
                $relId  = sprintf("%s-%06d", $relGen['prefix'], $relGen['ostatni_numer'] + 1);
                $pdo->prepare("UPDATE id_generator SET ostatni_numer = ? WHERE typ = 'relacja'")
                    ->execute([$relGen['ostatni_numer'] + 1]);

                $stmt = $pdo->prepare("INSERT INTO relacje_opiekun_klient 
                    (id, data_utworzenia, data_edycji, ostatnia_modyfikacja, id_klient, id_opiekun)
                    VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->execute([$relId, $data, $data, $ip, $newClientId, $opiekun_id]);
            }

            header("Location: ../public/klient.php");
            exit;

        } catch (PDOException $e) {
            error_log("Błąd zapisu: " . $e->getMessage());
            die("Wystąpił błąd zapisu do bazy.");
        }
    }
}

// Generuj ID w trybie dodawania
if ($mode === 'add') {
    try {
        $stmt = $pdo->prepare("SELECT ostatni_numer, prefix FROM id_generator WHERE typ = 'klienci'");
        $stmt->execute();
        $gen = $stmt->fetch();
        $proponowaneId = sprintf("%s-%06d", $gen['prefix'], $gen['ostatni_numer'] + 1);
    } catch (PDOException $e) {
        error_log("Błąd generowania ID klienta: " . $e->getMessage());
        $proponowaneId = 'BŁĄD';
    }
}

include __DIR__ . '/../templates/naglowek.php';
include __DIR__ . '/../templates/sidebar.php';
include __DIR__ . '/../templates/form_add_klient.php';
include __DIR__ . '/../templates/stopka.php';
