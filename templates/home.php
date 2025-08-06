<div class="flex-grow-1 p-4 mb-5 ms-5 me-5">
    <div class="content">
        <h2 class="active form">
            <i class="bi bi-house-door-fill  fs-1 me-2" style="padding-right: 5px; padding-left: 10px;"></i> Home
        </h2>
        <div class="table-responsive form">

            <h3 class="mb-3">Opis projektu - zadanie rekrutacyjne: Jacek Abram</h3>
            <p>
                Jest to prosta aplikacja webowa napisana w PHP, wykorzystująca MySQL, HTML, CSS, JavaScript, jQuery, Bootstrap i DataTables.
                Projekt umożliwia zarządzanie klientami oraz opiekunami (relacja wiele-do-wielu), a także monitorowanie historii zmian i sprawdzanie ustawień systemowych.
            </p>

            <h3 class="mt-4 mb-3">Funkcjonalności</h3>

            <h5>Menu boczne zawiera zakładki:</h5>
            <ul class="list-group mb-3">
                <li class="list-group-item">
                    <strong>Klienci</strong>
                    <ul class='green'>
                        <li><a href='../public/klient.php'>Wyświetlanie listy klientów z przypisanymi opiekunami (możliwość podejrzenia opiekuna) <small><b>(wymagane)</b></small></a></li>
                        <li><a href='../public/form_klient.php'>Dodawanie nowego klienta <small><b>(dodatkowe)</b></small></a></li>
                        <li><a href='../public/form_klient.php?mode=edit&id=K-000001'>Edycja danych klienta i opiekunów <small><b>(wymagane)</b></small></a></li>
                        <li><a href='../public/form_klient.php?mode=preview&id=K-000001'>Podgląd szczegółów klienta <small><b>(dodatkowe)</b></small></a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <strong>Opiekunowie</strong>
                    <ul class='green'>
                        <li><a href='../public/opiekun.php'>Wyświetlanie listy opiekunów z liczbą przypisanych klientów <small><b>(dodatkowe)</b></small></a></li>
                        <li><a href='../public/form_opiekun.php'>Dodawanie nowego opiekuna <small><b>(dodatkowe)</b></small></a></li>
                        <li><a href='../public/form_opiekun.php?mode=edit&id=O-000001'>Edycja danych opiekuna <small><b>(dodatkowe)</b></small></a></li>
                        <li><a href='../public/form_opiekun.php?mode=preview&id=O-000001'>Podgląd szczegółów opiekuna <small><b>(dodatkowe)</b></small></a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <strong>Historia</strong>
                    <ul class='green'>
                        <li><a href='../public/historia.php'>Rejestr zmian wykonanych w tabelach (np. dodanie, edycja rekordów) <small><b>(dodatkowe)</b></small></a></li>
                    </ul>
                </li>
                <li class="list-group-item">
                    <strong>Ustawienia</strong>
                    <ul class='green'>
                        <li><a href='../public/ustawienia.php'>Podgląd aktualnych wartości liczników ID oraz innych zmiennych systemowych <small><b>(dodatkowe)</b></small></a></li>
                    </ul>
                </li>
            </ul>

            <h3 class="mt-4 mb-3">Technologie</h3>
            <ul class="list-inline">
                <li class="list-inline-item badge bg-secondary me-2 p-2">PHP</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">MySQL</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">HTML / CSS</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">JavaScript</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">jQuery</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">Bootstrap</li>
                <li class="list-inline-item badge bg-secondary me-2 p-2">DataTables</li>
            </ul>


        </div>
    </div>
</div>
