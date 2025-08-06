<div class="flex-grow-1 p-4 mb-5 ms-5 me-5">
    <div class="content">
        <h2 class="active form">
            <i class="bi bi-person-heart fs-1" style="padding-right: 5px; padding-left: 10px;"></i> Opiekunowie
        </h2>
        <div class="table-responsive form">
            <table id="tabela-opiekunowie" class="table custom-table">
                <thead>
                    <tr>
                        <th>ID opiekuna</th>
                        <th>Opiekun</th>
                        <th>Status</th>
                        <th>Ilość klientów</th>
                        <th>Dodatkowe informacje</th>
                        <th>Akcja</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($opiekunowie as $opiekun): ?>
                    <tr>
                        <td><?= htmlspecialchars($opiekun['opiekun_id']) ?></td>
                        <td><?= htmlspecialchars($opiekun['opiekun_nazwa']) ?></td>
                        <td><?= htmlspecialchars($opiekun['opiekun_status']) ?></td>
                        <td><?= htmlspecialchars($opiekun['liczba_klientow']) ?></td>
                        <td><?= htmlspecialchars($opiekun['opiekun_info']) ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu<?= $opiekun['opiekun_id'] ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                    Rozwiń
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu<?= $opiekun['opiekun_id'] ?>">
                                    <li><a class="dropdown-item" href="../public/form_opiekun.php?mode=preview&id=<?= urlencode($opiekun['opiekun_id']) ?>">Podgląd</a>
                                    <li><a class="dropdown-item" href="../public/form_opiekun.php?mode=edit&id=<?= urlencode($opiekun['opiekun_id']) ?>">Edycja</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="../public/form_opiekun.php" class="btn btn-primary">Dodaj nowego opiekuna</a>
    </div>
</div>