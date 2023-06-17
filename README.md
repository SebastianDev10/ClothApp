# ClothApp

Aplikacja webowa, która służy do przeglądania markowych ubrań.

<h1>Wymagania (technologie)</h1>

<ul>
  <li>Docker (wersja 3.X)</li>
  <li>HTML5</li>
  <li>CSS3</li>
  <li>JavaScript</li>
  <li>PHP (wersja 7.4.3)</li>
  <li>PostgreSQL (wersja 15.X)</li>
</ul>

<h1>Instalacja</h1>

<ol>
  <li>Sklonuj repozytorium na swój dysk lokalny oraz zainstaluj potrzebne technologie.</li>
  <li>Z poziomu katalogu głównego uruchom docker komendą docker-compose up.</li>
  <li>Skonfiguruj połączenie z bazą danych PostgreSQL.</li>
  <li>Otwórz aplikację lokalnie pod adresem <a href="http://localhost:8080/">http://localhost:8080/</a>.</li>
</ol>

<h1>Struktura projektu</h1>

<h2>Pliki</h2>

<ul>
  <li>/index.php - plik główny aplikacji</li>
  <li>/Routing.php - konfiguracja routingu</li>
  <li>/Database.php - konfiguracja bazy danych</li>
  <li>/config.php - dane logowania do bazy danych</li>
  <li>/docker-compose.yml - konfiguracja Dockera</li>
</ul>

<h2>Katalogi</h2>

<ul>
  <li>/public/views - widoki (z rozszerzeniem .php)</li>
  <li>/public/css - pliki CSS</li>
  <li>/public/js - pliki JavaScript</li>
  <li>/public/img - pliki graficzne</li>
  <li>/public/img/uploads - pliki graficzne dodane przez użytkownika</li>
  <li>/src/controllers - kontrolery backendu (z rozszerzeniem .php)</li>
  <li>/src/repositories - repozytoria backendu (z rozszerzeniem .php)</li>
  <li>/src/models - modele dla kontrolerów i repozytoriów backendu (z rozszerzeniem .php)</li>
</ul>

<h1>Użycie</h1>

<ul>
  <li> Rejestracja konta</li>
  <li> Logowanie się</li>
  <li> Przeglądanie oraz przeszukiwanie bazy ubrań. Informacje o ubraniach: nazwa, opis, zdjęcie, liczba likeów i liczba dislikeów </li>
  <li> Dodawanie nowych ubrań </li>
  <li> Dane kontaktowe </li>
  <li> Strona opisowa About us </li>
  <li> Wylogowanie się </li>
</ul>

<h1>Autor</h1>

Sebastian Stefan ~ https://github.com/SebastianDev10/ClothApp
