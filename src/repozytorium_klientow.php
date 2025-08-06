<?php

    class RepozytoriumKlientow
    {
        private PDO $pdo;

        public function __construct(PDO $pdo)
        {
            $this->pdo = $pdo;
        }

        public function pobierzWszystkichZOpiekunami(): array
        {
            $sql = "
                SELECT 
                    k.id AS klient_id,
                    k.nazwa AS klient_nazwa,
                    o.id AS opiekun_id,
                    o.nazwa AS opiekun_nazwa,
                    o.status AS opiekun_status
                FROM klienci k
                LEFT JOIN relacje_opiekun_klient rok ON k.id = rok.id_klient
                LEFT JOIN opiekunowie o ON rok.id_opiekun = o.id
                ORDER BY k.nazwa
            ";

            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll();
        }
    }

?>


