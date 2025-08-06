<!-- Modal podglądu opiekuna -->
<div class="modal fade" id="opiekunModal" tabindex="-1" aria-labelledby="opiekunModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <!-- Wyśrodkowanie pionowe -->
        <div class="modal-content mx-auto" style="max-width: 500px; width: 100%;">
            <!-- Wyśrodkowanie poziome -->
            <div class="modal-header">
                <h5 class="modal-title" id="opiekunModalLabel">Szczegóły opiekuna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Zamknij"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="modalOpiekunId" class="form-label">ID</label>
                        <input type="text" class="form-control" id="modalOpiekunId" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modalOpiekunNazwa" class="form-label">Nazwa</label>
                        <input type="text" class="form-control" id="modalOpiekunNazwa" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modalOpiekunStatus" class="form-label">Status</label>
                        <input type="text" class="form-control" id="modalOpiekunStatus" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="modalOpiekunInfo" class="form-label">Dodatkowe informacje</label>
                        <textarea class="form-control" id="modalOpiekunInfo" rows="3" readonly></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Skrypt JS do obsługi modala -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('.btn-show-opiekun').forEach(button => {
            button.addEventListener('click', () => {
                const id = button.dataset.id;
                const nazwa = button.dataset.nazwa;
                const status = button.dataset.status;
                const info = button.dataset.info;

                document.getElementById('modalOpiekunId').value = id;
                document.getElementById('modalOpiekunNazwa').value = nazwa;
                document.getElementById('modalOpiekunStatus').value = status;
                document.getElementById('modalOpiekunInfo').value = info;
            });
        });
    });

</script>
