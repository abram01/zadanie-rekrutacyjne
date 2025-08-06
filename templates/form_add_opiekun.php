<div class="flex-grow-1 p-4 mb-5 ms-5 me-5">
    <div class="content">
        <h2 class="active form"><?= htmlspecialchars($tytul) ?></h2>

        <?php $readonly = $mode === 'preview' ? 'readonly disabled' : ''; ?>

        <form class="form" method="POST" action="">
            <!-- ID opiekuna -->
            <div class="mb-3">
                <label for="opiekunId" class="form-label">ID opiekuna</label>
                <input type="text" id="opiekunId" class="form-control bg-light text-muted" value="<?= htmlspecialchars($opiekun['id'] ?? $proponowaneId ?? '') ?>" readonly>
            </div>

            <!-- Nazwa -->
            <div class="mb-3">
                <label for="opiekunName" class="form-label">Nazwa / Imię i nazwisko <span class="text-danger">*</span></label>
                <input type="text" name="opiekunName" class="form-control" id="opiekunName" required <?= $readonly ?> value="<?= htmlspecialchars($opiekun['nazwa'] ?? '') ?>">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label for="opiekunStatus" class="form-label">Status opiekuna</label>
                <select name="opiekunStatus" class="form-select" id="opiekunStatus" required <?= $readonly ?>>
                    <option value="">Wybierz status...</option>
                    <option value="aktywny" <?= ($opiekun['status'] ?? '') === 'aktywny' ? 'selected' : '' ?>>Aktywny</option>
                    <option value="zawieszony" <?= ($opiekun['status'] ?? '') === 'zawieszony' ? 'selected' : '' ?>>Zawieszony</option>
                    <option value="nieaktywny" <?= ($opiekun['status'] ?? '') === 'nieaktywny' ? 'selected' : '' ?>>Nieaktywny</option>
                </select>
            </div>

            <!-- Dodatkowe informacje -->
            <div class="mb-3">
                <label for="opiekunInfo" class="form-label">Dodatkowe informacje</label>
                <textarea name="opiekunInfo" class="form-control" id="opiekunInfo" rows="4" <?= $readonly ?>><?= htmlspecialchars($opiekun['dodatkowe_info'] ?? '') ?></textarea>
            </div>

            <!-- Przycisk zapisu + powrót -->
            <?php if ($mode !== 'preview'): ?>
            <button type="submit" class="btn btn-sm btn-primary">Zapisz</button>
            <?php endif; ?>
            <a href="../public/opiekun.php" class="btn btn-sm btn-outline-primary">Powrót</a>
        </form>
    </div>
</div>
