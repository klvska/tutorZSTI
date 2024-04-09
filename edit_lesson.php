<?php
require_once 'php/config.php';

// Sprawdź, czy formularz został przesłany
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Pobierz ID lekcji z parametru w adresie URL
    $lesson_id = $_GET['lesson'];

    // Pobierz dane z formularza
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $file = $_FILES['file']['name'];

    // Aktualizuj lekcję w bazie danych
    $sql = "UPDATE lessons SET title = '$title', content = '$content', date = '$date', file = '$file' WHERE id = $lesson_id";

    // Wykonaj zapytanie SQL
    if (mysqli_query($conn, $sql)) {
        echo header("Location: success.php");
    } else {
        echo "Błąd podczas aktualizacji lekcji: " . mysqli_error($conn);
    }
}

// Pobierz dane lekcji do edycji
$lesson_id = $_GET['lesson'];
$query = "SELECT * FROM lessons WHERE id = $lesson_id";
$result = mysqli_query($conn, $query);

// Sprawdź, czy znaleziono lekcję
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $title = $row['title'];
    $content = $row['content'];
    $date = $row['date'];
    $file = $row['file'];
} else {
    echo "Nie znaleziono lekcji o podanym identyfikatorze";
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edycja lekcji</title>
</head>
<body>
    <header>
        <?php include 'templates/nav.php'; ?>
    </header>
    <main>
        <div class="create-lesson">
            <div class="container">
                <div class="create-lesson-container">
                    <h1>Formularz edycji lekcji</h1>
                    <form action="edit_lesson.php?lesson=<?php echo $lesson_id; ?>" method="post" enctype="multipart/form-data">
                        <label for="title">Tytul lekcji:</label><br>
                        <input type="text" id="title" name="title" value="<?php echo $title; ?>"><br>
                        <label for="content">Zawartosc lekcji:</label><br>
                        <textarea id="content" name="content"><?php echo $content; ?></textarea><br>
                        <label for="date">Data:</label><br>
                        <input type="date" id="date" name="date" value="<?php echo $date; ?>"><br>
                        <label for="file">Plik:</label><br>
                        <input type="file" id="file" name="file" value="<?php echo $file; ?>"><br><br>
                        <input type="submit" value="Edytuj lekcje">
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include 'templates/footer.php'; ?>
    </footer>
</body>
</html>
