<?php

class RepozytoriumUstawien
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function pobierzLiczniki(): array
    {
        $sql = "SELECT typ, prefix, ostatni_numer FROM id_generator";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
