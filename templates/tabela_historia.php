<div class="flex-grow-1 p-5">
    <div class="content">
        <h2 class="active form">
            <i class="bi bi-calendar-date fs-1 me-2" style="padding-right: 5px; padding-left: 10px;"></i> Historia zmian
        </h2>
        <div class="table-responsive form">
            <table id="tabela-historia" class="table custom-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tabela<br>
                        <th>ID rekordu</th>
                        <th>Pole</th>
                        <th>Stara wartość</th>
                        <th>Nowa wartość</th>
                        <th>IP</th>
                        <th>Data zmiany</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historia as $zmiana): ?>
                    <tr>
                        <td><?= htmlspecialchars((string)($zmiana['id'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['tabela'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['rekord_id'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['pole'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['stara_wartosc'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['nowa_wartosc'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['ip'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($zmiana['data_zmiany'] ?? '')) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
