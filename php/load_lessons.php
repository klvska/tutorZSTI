<?php

// Połączenie z bazą danych
require_once 'config.php';

// Zapytanie SQL do pobrania lekcji
$query = "SELECT * FROM lessons";

// Wykonanie zapytania
$result = mysqli_query($conn, $query);

// Tablica na przechowywanie lekcji
$lessons = array();

// Pętla po wynikach zapytania
while ($row = mysqli_fetch_assoc($result)) {
    // Dodanie danych lekcji do tablicy
    $lesson = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'start' => $row['date'], // Data rozpoczęcia lekcji
        'end' => $row['date'], // Data zakończenia lekcji (możesz dostosować do swoich potrzeb)
        // Dodaj inne potrzebne pola lekcji
    );
    // Dodanie lekcji do tablicy lekcji
    array_push($lessons, $lesson);
}

// Konwersja tablicy na format JSON
echo json_encode($lessons);

// Zamknięcie połączenia z bazą danych
mysqli_close($conn);

?>
