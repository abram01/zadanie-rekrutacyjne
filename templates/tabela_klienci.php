<div class="flex-grow-1 p-5">
    <div class="content">
        <h2 class="active form">
            <i class="bi bi-people-fill fs-1 me-2" style="padding-right: 5px; padding-left: 10px;"></i> Klienci
        </h2>
        <div class="table-responsive form">
            <table id="tabela-klienci" class="table custom-table">
                <thead>
                    <tr>
                        <th>ID klienta</th>
                        <th>Nazwa klienta</th>
                        <th>Opiekunowie</th>
                        <th>Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($klienci as $klient_id => $klient): ?>
                    <tr>
                        <td><?= htmlspecialchars($klient_id) ?></td>
                        <td><?= htmlspecialchars($klient['nazwa']) ?></td>
                        <td>
                            <?php foreach ($klient['opiekunowie'] as $opiekun): ?>
                            <?php $btnClass = $opiekun['status'] === 'aktywny' ? 'btn-outline-success' : 'btn-outline-danger'; ?>
                            <button type="button" class="btn <?= $btnClass ?> btn-sm mb-1 me-1 btn-show-opiekun" data-id="<?= htmlspecialchars($opiekun['id']) ?>" data-nazwa="<?= htmlspecialchars($opiekun['nazwa']) ?>" data-status="<?= htmlspecialchars($opiekun['status']) ?>" data-info="<?= htmlspecialchars($opiekun['info'] ?? '') ?>" data-bs-toggle="modal" data-bs-target="#opiekunModal">
                                <?= htmlspecialchars($opiekun['nazwa']) ?>
                            </button>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" id="dropdownMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                    Rozwiń
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu">
                                    <li><a class="dropdown-item" href="../public/form_klient.php?mode=preview&id=<?= urlencode($klient_id) ?>">Podgląd</a>
                                    <li><a class="dropdown-item" href="../public/form_klient.php?mode=edit&id=<?= urlencode($klient_id) ?>">Edycja</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <br>
        <a href="../public/form_klient.php" class="btn btn-primary">Dodaj nowego klienta</a>
    </div>
</div>
