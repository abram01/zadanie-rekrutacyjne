<?php

class RepozytoriumHistorii
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function pobierzWszystkie(): array
    {
        $sql = "
            SELECT 
                id,
                tabela,
                rekord_id,
                pole,
                stara_wartosc,
                nowa_wartosc,
                ip,
                data_zmiany
            FROM historia_zmian
            ORDER BY data_zmiany DESC
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
