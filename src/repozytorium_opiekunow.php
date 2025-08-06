<?php

class RepozytoriumOpiekunow
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function pobierzWszystkichZLiczbaKlientow(): array
    {
        $sql = "
            SELECT 
                o.id AS opiekun_id,
                o.nazwa AS opiekun_nazwa,
                o.status AS opiekun_status,
                o.dodatkowe_info AS opiekun_info,
                COUNT(rok.id_klient) AS liczba_klientow
            FROM opiekunowie o
            LEFT JOIN relacje_opiekun_klient rok ON o.id = rok.id_opiekun
            GROUP BY o.id, o.nazwa, o.status, o.dodatkowe_info
            ORDER BY o.nazwa
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
