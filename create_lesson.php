<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Tworzenie lekcji</title>
</head>
<body>
    <header>
        <?php 
        include 'templates/nav.php';
        ?>
    </header>
    <main>
    <div class="create-lesson">
        <div class="container">
            <div class="create-lesson-container">
                <h1>Formularz tworzenia lekcji</h1>
                <form action="php/add_lesson.php" method="post" enctype="multipart/form-data">
                    <label for="title">Tytul lekcji:</label><br>
                    <input type="text" id="title" name="title"><br>
                    <label for="content">Zawartosc lekcji:</label><br>
                    <textarea id="content" name="content"></textarea><br>
                    <input type="hidden" id="date" name="date" value=""><!-- Ukryte pole na datę -->
                    <label for="file">Plik:</label><br>
                    <input type="file" id="file" name="file"><br><br>
                    <input type="submit" value="Dodaj lekcje">
                </form>
            </div>
        </div>
    </div>
    </main>
    <footer>
        <?php 
        include 'templates/footer.php';
        ?>
    </footer>
    <script>
        // Pobranie aktualnej daty i przypisanie jej do pola ukrytego
        document.getElementById("date").value = new Date().toISOString().slice(0, 10);
    </script>
</body>
</html>
