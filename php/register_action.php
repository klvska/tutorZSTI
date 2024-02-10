<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $errors = [];

    // Sprawdzenie, czy email już istnieje w bazie danych
    $check = "SELECT * FROM Users WHERE Email = '$email'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        $errors[] = 'Email already exists.';
    }

    // Jeśli nie ma żadnych błędów, przystępujemy do rejestracji użytkownika
    if (empty($errors)) {
        // Haszowanie hasła
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Przygotowanie zapytania SQL
        $sql = "INSERT INTO users (Username, PasswordHash, Email) VALUES ('$username', '$hashed_password', '$email')";

        // Wykonanie zapytania
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Zamknięcie połączenia z bazą danych
        $conn->close();
    } else {
        // Wyświetlenie błędów rejestracji
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>
