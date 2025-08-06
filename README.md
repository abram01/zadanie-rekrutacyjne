# Opis projektu – zadanie rekrutacyjne (Jacek Abram)

Jest to prosta aplikacja webowa napisana w PHP, wykorzystująca MySQL, HTML, CSS, JavaScript, jQuery, Bootstrap i DataTables.  
Projekt umożliwia zarządzanie klientami oraz opiekunami (relacja wiele-do-wielu), a także monitorowanie historii zmian i sprawdzanie ustawień systemowych.

## Funkcjonalności

### Klienci
- Wyświetlanie listy klientów z przypisanymi opiekunami
- Dodawanie nowego klienta
- Edycja danych klienta
- Podgląd szczegółów klienta

### Opiekunowie
- Wyświetlanie listy opiekunów z liczbą przypisanych klientów
- Dodawanie nowego opiekuna
- Edycja danych opiekuna
- Podgląd szczegółów opiekuna

### Historia
- Rejestr zmian wykonanych w tabelach (np. dodanie, edycja rekordów)

### Ustawienia
- Podgląd aktualnych wartości liczników ID oraz innych zmiennych systemowych

## Technologie

- PHP
- MySQL
- HTML / CSS
- JavaScript
- jQuery
- Bootstrap
- DataTables

## Instalacja i uruchomienie

1. **Pobierz lub sklonuj projekt**
    - Z repozytorium Git lub jako archiwum .zip

2. **Skonfiguruj bazę danych**
    - Utwórz nową bazę danych w MySQL / MariaDB
    - Zaimportuj plik `baza.sql` (dołączony do projektu) do swojej bazy danych

3. **Ustaw połączenie z bazą danych**
    - W pliku `config/db.php` ustaw odpowiednie dane:
      ```php
      $host = 'localhost';
      $dbname = 'twoja_baza';
      $user = 'twoj_uzytkownik';
      $pass = 'twoje_haslo';
      ```

4. **Uruchom aplikację**
    - Umieść projekt w katalogu serwera lokalnego (np. `htdocs` w XAMPP)
    - Otwórz przeglądarkę i przejdź do:
      ```
      http://localhost/nazwa_folderu/public/
      ```
