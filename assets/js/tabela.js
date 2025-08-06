$(document).ready(function () {
    const options = {
        pageLength: 10,
        lengthMenu: [5, 10, 25],
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/pl.json",
        }
    };

    if (!$.fn.DataTable.isDataTable('#tabela-klienci') && $('#tabela-klienci').length) {
        $('#tabela-klienci').DataTable(options);
    }

    if (!$.fn.DataTable.isDataTable('#tabela-opiekunowie') && $('#tabela-opiekunowie').length) {
        $('#tabela-opiekunowie').DataTable(options);
    }

    if (!$.fn.DataTable.isDataTable('#tabela-historia') && $('#tabela-historia').length) {
        const tabelaHistoria = $('#tabela-historia').DataTable({
            ...options,
            initComplete: function () {
                const columnIndex = 1; // kolumna "tabela"
                const column = this.api().column(columnIndex);

                // Stylujemy kontener z inputem i dodajemy do niego select
                const $filterWrapper = $('#tabela-historia_filter');
                $filterWrapper.css({
                    display: 'flex',
                    alignItems: 'center',
                    gap: '1rem' // odstęp między elementami
                });

                const select = $('<select class="form-select form-select-sm"><option value="">Wszystkie tabele</option></select>')
                    .on('change', function () {
                        const val = $.fn.dataTable.util.escapeRegex($(this).val());
                        column.search(val ? '^' + val + '$' : '', true, false).draw();
                    });

                column.data().unique().sort().each(function (d) {
                    if (d) select.append('<option value="' + d + '">' + d + '</option>');
                });

                $filterWrapper.prepend(select); // wstawiamy select obok inputa
            }
        });
    }
});
