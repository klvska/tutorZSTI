<?php
session_start(); // Rozpoczęcie sesji, jeśli nie została jeszcze rozpoczęta

require_once 'config.php';

// Sprawdzenie, czy użytkownik jest zalogowany
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Przekierowanie użytkownika do strony logowania, jeśli nie jest zalogowany
    exit();
}

// Pobranie ID zalogowanego użytkownika
$user_id = $_SESSION["user_id"];

// Pobranie informacji o tutorze na podstawie ID użytkownika
$query = "SELECT * FROM tutors WHERE user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Pobranie informacji o tutorze
    $row = $result->fetch_assoc();
    $tutor_id = $row["id"];
    $f_name = $row["f_name"];
    $s_name = $row["s_name"];
    $subject = $row["subject"];
    $skype = $row["skype"];
    $discord = $row["discord"];
    $teams = $row["teams"];

    // Pobranie danych z formularza
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];

    // Przesłanie pliku na serwer
    $uploads_dir = 'uploads/';
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp, "$uploads_dir/$file_name");

    // Zapisanie informacji o lekcji do bazy danych
    $query = "INSERT INTO lessons (tutor_id, tutor_name, tutor_surname, title, content, date, subject, communicator, file) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("issssssss", $tutor_id, $f_name, $s_name, $title, $content, $date, $subject, $communicator, $file_name);
    $stmt->execute();

    // Przekierowanie użytkownika z powrotem do formularza lub gdziekolwiek indziej
    header("Location: ../profile.php");
    exit();
} else {
    echo "Błąd: Nie znaleziono informacji o użytkowniku.";
}

$stmt->close();
$conn->close();
?>
