<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/icons/favicon.ico">
    <title>ZSTI tutor</title>
</head>
<body>
<header>
    <?php include "templates/nav.php"; ?>
</header>
<main>
    <?php
    // Sprawdzanie, czy parametr subject jest przekazany w adresie URL
    if (isset($_GET['subject'])) {
        // Tablica subjectów - może być wczytana z zewnętrznego pliku lub bazy danych
         $subjects = [
            "Math" => [
                "name" => "Matematyka",
                "sql" => "SELECT * FROM tutors WHERE subject = 'math'"
            ],
            "Polish" => [
                "name" => "J.Polski",
                "sql" => "SELECT * FROM tutors WHERE subject = 'polish'"
            ],
            "English" => [
                "name" => "J.Angielski",
                "sql" => "SELECT * FROM tutors WHERE subject = 'english'"
            ],
            "Chemistry" => [
                "name" => "Chemia",
                "sql" => "SELECT * FROM tutors WHERE subject = 'chemistry'"
            ],
            "Physics" => [
                "name" => "Fizyka",
                "sql" => "SELECT * FROM tutors WHERE subject = 'physics'"
            ],
            "Science" => [
                "name" => "Biologia",
                "sql" => "SELECT * FROM tutors WHERE subject = 'science'"
            ],
            "Coding" => [
                "name" => "Programowanie",
                "sql" => "SELECT * FROM tutors WHERE subject = 'coding'"
            ],
            "History" => [
                "name" => "Historia",
                "sql" => "SELECT * FROM tutors WHERE subject = 'history'"
            ],
            "Geografia" => [
                "name" => "Geografia",
                "sql" => "SELECT * FROM tutors WHERE subject = 'geography'"
            ],
        ];

        // Sprawdzenie, czy wybrany subject istnieje w tablicy $subjects
        $selectedSubject = $_GET['subject'];
        if (array_key_exists($selectedSubject, $subjects)) {
            $subjectData = $subjects[$selectedSubject];
            
            // Pobranie danych z bazy danych na podstawie zapytania SQL
            require_once "php/config.php"; // Zmodyfikuj ścieżkę do pliku konfiguracyjnego bazy danych

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = $subjectData['sql'];
            $result = $conn->query($sql);

            echo "<div class='subject-tutors'>";
            echo "<div class='container'>";
            echo "<div class='subject-tutors-content'>";
            echo "<div class='subject-tutors-header'>";
            echo "<h1>Korepetytorzy z przedmiotu: <span>{$subjectData['name']}</span></h1>";
            echo "</div>";
            echo "<div class='subject-tutors-list'>";

            // Wyświetlanie danych z bazy danych, jeśli są dostępne
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $lastNameInitial = substr($row['s_name'], 0, 1);
                    $skype = $row["skype"];
                    $discord = $row["discord"];
                    $teams = $row["teams"];
                    echo "<div class='tutor-item'>";
                    echo "<div class='tutor-desc'>";
                    echo "<div class='tutor-img'><img src='assets/images/default-profile.png' alt='user-icon'></div>";
                    echo "<div class='tutor-column'>";
                    echo "<h3>{$row['f_name']} {$lastNameInitial}.</h3>";
                    echo "<div class='tutor-subject'><img src='assets/icons/cap.png'><span>{$subjectData['name']}</span></div>";
                    echo "<button>rozpocznij nauke</button>";
                    echo "<a href='https://discord.com/'>napisz wiadomosc</a>";
                    echo "</div>";
                    echo "<div class='tutor-about'>";
                    echo "<div class='tutor-rating'><img src='assets/icons/star.png'><span>"
                        . ($row["rating"] !== null ? "{$row['rating']}" : "0.0") ."</span></div>";
                    echo "<div class='tutor-communicators'>
                    <h4>Gdzie ucze: </h4>" .
                        ($skype !== null ? "<div class='communicator-column'><img src='assets/images/skype.png'><span>{$row['skype']}</span></div>" : "") .
                        ($discord !== null ? "<div class='communicator-column'><img src='assets/images/discord.png'><span>{$row['discord']}</span></div>" : "") .
                        ($teams !== null ? "<div class='communicator-column teams'><img src='assets/images/teams.png'><span>{$row['teams']}</span></div>" : "") .
                     "</div>";
                    echo "<div class='tutor-about-me'><p>{$row['about_me']}</p></div>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='tutor-topics'>";
                    echo "<h3>Tematy: </h3>";
                    echo "<ul>";
                    $topics = explode(".", $row['topics']);
                    foreach ($topics as $topic) {
                        echo "<li>{$topic}</li>";
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "Brak danych do wyświetlenia.";
            }

            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            
            $conn->close();
        } else {
            echo "Nieprawidłowy subject.";
        }
    } else {
        echo "Brak wybranego subjectu.";
    }
    ?>
</main>
<footer>
    <?php include "templates/footer.php"; ?>
</footer>
</body>
</html>
