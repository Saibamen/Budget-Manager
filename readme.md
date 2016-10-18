# Budget Manager by Adam "Saibamen" Stachowicz

[![Build Status](https://travis-ci.com/Saibamen/Budget-Manager.svg?token=aGxL6XsgiKL8Ss4SGZve&branch=master)](https://travis-ci.com/Saibamen/Budget-Manager)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

## Technologie i biblioteki

- PHP 7
- MySQL
- Laravel 5.3
- JavaScript
- AJAX
- JSON
- Highcharts
- Travis CI
- Bootstrap
- Font Awesome

## Wymagania

- PHP 7
- Najnowsza wersja [Composera](https://getcomposer.org/)

## Instalacja - localhost

1. Wypakuj całą zawartość do osobnego folderu w htdocs
2. Zmień nazwę pliku `.env.example` na `.env` oraz zmień w nim `APP_URL`, połączenie do bazy danych oraz maila
3. Utwórz poniższe foldery:
```
mkdir bootstrap/cache
mkdir storage
mkdir storage/app
mkdir storage/framework
mkdir storage/framework/sessions
mkdir storage/framework/cache
mkdir storage/framework/views
```
4. Wykonaj następujące polecenia:
  - `composer install --no-interaction`
  - `php artisan key:generate`
  - php artisan migrate
  - php artisan db:seed
5. Uruchom serwer poleceniem `php artisan serve`
6. Aplikacja dostępna jest już pod adresem [http://localhost:8000](http://localhost:8000)

## Instalacja - własny serwer

1. Wypakuj zawartość folderu `public` na serwer FTP
2. Resztę folderów dla bezpieczeństwa umieść w osobnym folderze poza `public_html` (lub `htaccess`)
3. W `index.php` z folderu `public` zamień obie ścieżki tak, aby znajdywały główny folder z kroku 2
4. Zmień nazwę pliku `.env.example` na `.env` oraz zmień w nim `APP_URL`, połączenie do bazy danych oraz maila
5. Ustaw chmody oraz utwórz poniższe foldery:
  - mkdir bootstrap/cache
  - mkdir storage
  - mkdir storage/app
  - mkdir storage/framework
  - mkdir storage/framework/sessions
  - mkdir storage/framework/cache
  - mkdir storage/framework/views
  - chmod -R 777 bootstrap/cache
  - chmod -R 777 storage
6. Wykonaj następujące polecenia:
  - composer install --no-interaction
  - php artisan key:generate
  - php artisan migrate
  - php artisan db:seed

## Funkcje

- [x] TODO
- [ ] TODO 2

## Demo: [budgetmanager.it-maniak.pl](http://budgetmanager.it-maniak.pl/)

## O autorze

Adam "Saibamen" Stachowicz<br />
Państwowa Wyższa Szkoła Zawodowa im. Witelona w Legnicy<br />
III rok Informatyki spec. Systemy i Sieci Komputerowe

Programista od 14 roku życia, głównie webdev (PHP).<br />
W wolnych chwilach rowerzysta, DJ oraz fotograf.
