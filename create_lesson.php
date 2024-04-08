<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie lekcji</title>
</head>
<body>
    <h1>Formularz tworzenia lekcji</h1>
    <form action="php/add_lesson.php" method="post" enctype="multipart/form-data">
        <label for="title">Tytuł lekcji:</label><br>
        <input type="text" id="title" name="title"><br>
        <label for="content">Zawartosc lekcji:</label><br>
        <textarea id="content" name="content"></textarea><br>
        <input type="hidden" id="date" name="date" value=""><!-- Ukryte pole na datę -->
        <label for="file">Plik:</label><br>
        <input type="file" id="file" name="file"><br><br>
        <input type="submit" value="Dodaj lekcję">
    </form>
    <script>
        // Pobranie aktualnej daty i przypisanie jej do pola ukrytego
        document.getElementById("date").value = new Date().toISOString().slice(0, 10);
    </script>
</body>
</html>
