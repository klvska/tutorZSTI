$(document).ready(function () {
  var calendar = $("#calendar").fullCalendar({
    // Konfiguracja kalendarza
    header: {
      left: "prev,next today",
      center: "title",
      right: "month,agendaWeek,agendaDay",
    },
    // Pobranie lekcji z pliku load_lessons.php
    events: "php/load_lessons.php",
    // Obsługa kliknięcia na puste pole w kalendarzu
    dayClick: function (date, jsEvent, view) {
      // Sprawdzenie czy w danym dniu nie ma już notatki
      var lessonId = getLessonId(date.format("YYYY-MM-DD"));
      if (lessonId == null) {
        // Brak notatki, można tworzyć
        window.location.href =
          "create_lesson.php?date=" + date.format("YYYY-MM-DD"); // Przekierowanie do formularza tworzenia lekcji
      } else {
        // Notatka już istnieje, przekierowanie do strony z podglądem notatki lub edycją/usunięciem notatki w zależności od roli użytkownika
        window.location.href = "view_lesson.php?id=" + lessonId;
      }
    },
  });

  // Funkcja pobierająca id lekcji dla danej daty
  function getLessonId(date) {
    var lessonId = null;
    // Tutaj wykonaj zapytanie AJAX do serwera, aby pobrać id lekcji dla danej daty
    // Możesz przekazać date do skryptu PHP, który zwróci id lekcji
    // Przykładowa implementacja zapytania AJAX:
    // $.ajax({
    //     url: 'get_lesson_id.php',
    //     method: 'POST',
    //     data: { date: date },
    //     async: false,
    //     success: function(response) {
    //         lessonId = response;
    //     }
    // });
    return lessonId;
  }
});
