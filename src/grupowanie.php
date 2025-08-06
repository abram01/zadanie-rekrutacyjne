<?php

    function grupujPoKliencie(array $results): array
    {
        $klienci = [];

        foreach ($results as $row) {
            $id = $row['klient_id'];

            if (!isset($klienci[$id])) {
                $klienci[$id] = [
                    'nazwa' => $row['klient_nazwa'],
                    'opiekunowie' => [],
                ];
            }

            if (!empty($row['opiekun_id'])) {
                $klienci[$id]['opiekunowie'][] = [
                    'id' => $row['opiekun_id'],
                    'nazwa' => $row['opiekun_nazwa'],
                    'status' => $row['opiekun_status'],
                ];
            }
        }

        return $klienci;
    }

?>
