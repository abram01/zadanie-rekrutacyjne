<div class="flex-grow-1 p-5">
    <div class="content">
        <h2 class="active form"><?= htmlspecialchars($tytul) ?></h2>

        <?php $readonly = $mode === 'preview' ? 'readonly disabled' : ''; ?>

        <form class="form" method="POST" action="">
            <div class="mb-3">
                <label for="clientId" class="form-label">ID klienta</label>
                <input type="text" id="clientId" class="form-control bg-light text-muted" value="<?= htmlspecialchars($klientId ?? $proponowaneId ?? '') ?>" readonly>
            </div>

            <div class="mb-3">
                <label for="clientName" class="form-label">Nazwa / Imię i nazwisko <span class='text-danger'>*</span></label>
                <input type="text" name="clientName" class="form-control" id="clientName" required <?= $readonly ?> value="<?= htmlspecialchars($klient['nazwa'] ?? '') ?>">
            </div>

            <div class="mb-3">
                <label class="form-label d-block">
                    Opiekunowie
                    <a style='color: #6bac52;' href="../public/opiekun.php" tabindex="0" data-bs-toggle="tooltip" title="Tutaj ustawisz aktywnych opiekunów">
                        <small>(skonfiguruj opiekunów)</small>
                    </a>
                </label>
                <?php
        try {
            $stmt = $pdo->query("SELECT id, nazwa FROM opiekunowie WHERE status = 'aktywny'");
            foreach ($stmt as $row) {
                $checked = in_array($row['id'], $przypisaniOpiekunowie) ? 'checked' : '';
                echo '<div class="form-check form-check-inline">';
                echo '<input class="form-check-input" type="checkbox" name="guardians[]" id="' . $row['id'] . '" value="' . $row['id'] . '" ' . $checked . ' ' . $readonly . '>';
                echo '<label class="form-check-label" for="' . $row['id'] . '">' . htmlspecialchars($row['nazwa']) . '</label>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            error_log("Błąd pobierania opiekunów: " . $e->getMessage());
            echo '<div class="text-danger">Błąd ładowania listy opiekunów.</div>';
        }
        ?>
            </div>

            <div class="mb-3">
                <label for="clientStatus" class="form-label">Status klienta</label>
                <select name="clientStatus" class="form-select" id="clientStatus" required <?= $readonly ?>>
                    <option value="">Wybierz status...</option>
                    <option value="aktywny" <?= ($klient['status'] ?? '') === 'aktywny' ? 'selected' : '' ?>>Aktywny</option>
                    <option value="zawieszony" <?= ($klient['status'] ?? '') === 'zawieszony' ? 'selected' : '' ?>>Zawieszony</option>
                    <option value="nieaktywny" <?= ($klient['status'] ?? '') === 'nieaktywny' ? 'selected' : '' ?>>Nieaktywny</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="clientComment" class="form-label">Komentarz</label>
                <textarea name="clientComment" class="form-control" id="clientComment" rows="4" <?= $readonly ?>><?= htmlspecialchars($klient['komentarz'] ?? '') ?></textarea>
            </div>

            <?php if ($mode !== 'preview'): ?>
            <button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
            <?php endif; ?>
            <a href="../public/klient.php" class="btn btn-sm btn-outline-primary">Powrót</a>
        </form>
    </div>
</div>
