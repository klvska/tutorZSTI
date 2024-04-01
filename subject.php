<?php 

// Funkcja do pobrania danych z bazy danych
function fetchDataFromDatabase($subject)
{
    require_once "config.php";

    $sql = "SELECT * FROM tutors WHERE subject = '$subject'";
    $result = mysqli_query($conn, $sql);
    
    return $result;
}

// Wyświetlenie selecta dla danego przedmiotu
function displaySelectForSubject($subject)
{
    $result = fetchDataFromDatabase($subject);
    // Tutaj wyświetlasz select na podstawie danych pobranych z bazy
    // np. możesz użyć pętli while do wygenerowania opcji z wyników zapytania
    echo "<select name='$subject'>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='{$row['id']}'>{$row['name']}</option>";
    }
    echo "</select>";
}

// Tutaj wyświetlasz odpowiedni select w zależności od wartości "title"
if (isset($_GET['subject']) && array_key_exists($_GET['subject'], $subjects)) {
    $selectedSubject = $_GET['subject'];
    $actualSubject = $subjects[$selectedSubject];
    
    // Wyświetlenie selecta dla wybranego przedmiotu
    displaySelectForSubject($actualSubject);
} else {
    // Wyświetlenie błędu lub innej informacji, jeśli brakuje parametru w adresie URL
    echo "Nieprawidłowy przedmiot.";
}
?>