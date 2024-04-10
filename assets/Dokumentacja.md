# Dokumentacja aplikacji

# Dokumentacja projektu tutorZSTI

## 1. Wprowadzenie

TutorZSTI to platforma edukacyjna dla studentów ZSTI, która umożliwia organizowanie sesji korepetycji w szkole. Aplikacja obsługuje dwie role użytkowników: Tutor i Student.

## 2. Wymagania funkcjonalne

- Logowanie: Aplikacja umożliwia użytkownikom logowanie do systemu. Użytkownik musi podać swoją nazwę użytkownika i hasło, aby zalogować się do systemu.
- Rejestracja: Aplikacja umożliwia nowym użytkownikom rejestrację w systemie. Użytkownik musi podać swoje dane, takie jak email, nazwa użytkownika i hasło, aby utworzyć nowe konto.
- Rejestracja dla korepetytora: umożliwia zalogowanym użytkownikom zostanie korepetytorem. Użytkownik musi podać swoje imię i nazwisko, przedmiot, którego będzie uczył, komunikatory, takie jak skype, discord lub teams, tematy, które korepetytor potrafi oraz krótki opis siebie.
- Zarządzanie lekcjami korepetycji: Aplikacja umożliwia zarządzanie lekcjami korepetycji. Powinna umożliwiać tworzenie, edycję i usuwanie lekcji.
- Aplikacja umożliwia studentom przeglądanie lekcji korepetytorów oraz możliwość pobrania pliku lekcji.
- Ocena i recenzowanie lekcji. Aplikacja umożliwia studentom ocenianie i recenzowanie sesji korepetycji.

## 3. Wymagania niefunkcjonalne

- Bezpieczeństwo: Aplikacja powinna być bezpieczna. Hasła użytkowników powinny być odpowiednio zaszyfrowane. Wszystkie dane powinny być przechowywane bezpiecznie.
- Wydajność: Aplikacja powinna być wydajna. Powinna być w stanie obsłużyć wielu użytkowników jednocześnie bez spowolnienia.
- Kompatybilność: Aplikacja powinna być kompatybilna z różnymi przeglądarkami internetowymi.
- Użyteczność: Aplikacja powinna być łatwa w użyciu. Interfejs użytkownika powinien być intuicyjny i łatwy do nawigacji.
- Niezawodność: Aplikacja powinna być niezawodna. Powinna być dostępna dla użytkowników 24/7.
- Skalowalność: Aplikacja powinna być skalowalna. Powinna być w stanie obsłużyć wzrost liczby użytkowników i sesji korepetycji bez utraty wydajności.

## 4. Architektura aplikacji

Aplikacja jest zbudowana na podstawie architektury klient-serwer. Frontend aplikacji jest zbudowany z wykorzystaniem HTML i CSS. Backend aplikacji jest zbudowany z wykorzystaniem PHP Aplikacja korzysta z bazy danych MySQL do przechowywania danych.

## 5. Opis interfejsu użytkownika

- Strona logowania: Użytkownik musi podać swoją nazwę użytkownika i hasło, aby zalogować się do systemu.
- Strona rejestracji: Nowy użytkownik musi podać swoje dane, takie jak email, nazwa użytkownika, hasło, aby utworzyć nowe konto.
- Strona korepetytorów: Wyświetla listę dostępnych korepetytorów. Użytkownik może przeglądać informacje o korepetytorze.
- Strona lekcji korepetytorów: Wyświetla lekcje wszystkich korepetytorów, z możliwością sortowania wyników oraz podgląd danej lekcji.

## 6. Opis API

Aplikacja korzysta z API do komunikacji między frontendem a backendem. API umożliwia wykonywanie operacji CRUD (Create, Read, Update, Delete) na danych sesji korepetycji, zapisanych studentów i recenzji.

## 7. Opis bazy danych

Aplikacja korzysta z bazy danych MySQL do przechowywania danych. Baza danych składa się z następujących tabel: `tutors`, `users`, `lessons`, `user_action`.

## 8. Instrukcje instalacji

Aplikacja wymaga serwera Apache, PHP i MySQL do działania. Aplikacja może być zainstalowana na dowolnym systemie operacyjnym, który obsługuje te technologie, takim jak Windows, Linux lub MacOS.

## 9. Instrukcje obsługi

Aplikacja jest łatwa w obsłudze. Użytkownik musi zalogować się do systemu, aby uzyskać dostęp do funkcji aplikacji. Użytkownik może przeglądać dostępne sesje korepetycji, zapisywać się na sesje, oceniać i recenzować sesje.

## 10. Informacje o licencji

Aplikacja jest dostępna na licencji MIT. Może być swobodnie używana, modyfikowana i dystrybuowana zgodnie z warunkami licencji.

## 11. Diagramy

[Diagram klas](https://www.notion.so/Diagram-klas-f02fea8110b843bd9d61472f802c5209?pvs=21)

[Diagram przypadków użycia](https://www.notion.so/Diagram-przypadk-w-u-ycia-1797cdf1bd694d2088735471e43bc95a?pvs=21)