<div class="flex-grow-1 p-4 mb-5 ms-5 me-5">
    <div class="content">
        <h2 class="active form">
            <i class="bi bi-gear-wide-connected fs-1 me-2" style="padding-right: 5px; padding-left: 10px;"></i> Ustawienia – Liczniki ID
        </h2>

        <div class="table-responsive form">
            <div class="row">
                <?php
                $nazwy = [
                    'relacja' => 'Relacja',
                    'historia' => 'Historia',
                    'klienci' => 'Klient',
                    'opiekunowie' => 'Opiekun'
                ];
                foreach ($liczniki as $licznik):
                    $typ = $licznik['typ'];
                    if (!isset($nazwy[$typ])) continue;
                ?>
                <div class="col-sm-6 col-md-4 col-xl-3">
                    <div class="card shadow-sm border h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold"><?= htmlspecialchars($nazwy[$typ]) ?></h5>
                            <p style="color: black;" class="card-text mb-1">Prefix: <strong><?= htmlspecialchars($licznik['prefix']) ?></strong></p>
                            <p style="color: black;" class="card-text">Ostatni numer: <strong><?= htmlspecialchars($licznik['ostatni_numer']) ?></strong></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
