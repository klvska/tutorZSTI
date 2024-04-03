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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function () {
            var calendar = $("#calendar").fullCalendar({
                // Konfiguracja kalendarza
                header: {
                    left: "prev,next today",
                    center: "title",
                    right: "month,agendaWeek,agendaDay",
                },
                // Obsługa kliknięcia na puste pole w kalendarzu
                dayClick: function (date, jsEvent, view) {
                    // Ustawienie wartości daty w ukrytym polu formularza
                    $("#date").val(date.format("YYYY-MM-DD"));
                    // Przekierowanie do formularza tworzenia lekcji
                    window.location.href = "create_lesson.php";
                },
            });
        });
    </script>
</body>
</html>
