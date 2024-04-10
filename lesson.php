<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>ZSTI tutor</title>
</head>
<body>
    <header>
        <?php include_once "templates/nav.php"; ?>
    </header>
    <main>
        <div class="full-lesson-container">
            <div class="container">
                <div class="full-lesson-content">
                    <div class="full-lesson-text">
                        <?php
                        require_once 'php/config.php';

                        if(isset($_GET['lesson'])) {
                            $lesson_id = $_GET['lesson'];

                            // Fetch the lesson information from the database
                            $query = "SELECT * FROM lessons WHERE id = $lesson_id";
                            $result = mysqli_query($conn, $query);

                            if(mysqli_num_rows($result) > 0) {
                                $lesson = mysqli_fetch_assoc($result);
                                echo "<h1>Lekcja: <span>{$lesson['title']}</span></h1>";
                                echo "<div class='full-lesson-author'>";
                                echo "<p>Autor: <span>{$lesson['tutor_name']} {$lesson['tutor_surname']}</span></p>";
                                echo "<p>Przedmiot: <span>{$lesson['subject']}</span></p>";
                                echo "<p>Data: <span>{$lesson['date']}</span></p>";
                                echo "</div>";  
                                echo "<p class='lesson-content'>Zawartosc: <span>{$lesson['content']}</span></p>";
                                if(!empty($lesson['file'])) {
                                    echo "<a class='file' href='assets/uploads/{$lesson['file']}'>Pobierz plik</a>";
                                }
                                if(isset($_SESSION['user_id'])){
                                echo "<form method='post'>";
                                echo "<button type='submit' name='like'><img src='assets/icons/like.svg'>Like</button>";
                                echo "<button type='submit' name='dislike'><img src='assets/icons/dislike.svg'>Dislike</button>";
                                echo "</form>";
                                

                               if(isset($_POST['like']) || isset($_POST['dislike'])) {
                                    $user_id = $_SESSION['user_id'];
                                    $lesson_id = $lesson['id'];
                                    $action = isset($_POST['like']) ? 'like' : 'dislike';

                                    // Sprawdzenie, czy użytkownik już ocenił daną lekcję
                                    $query_check_user_action = "SELECT * FROM user_actions WHERE user_id = $user_id AND lesson_id = $lesson_id";
                                    $result_check_user_action = mysqli_query($conn, $query_check_user_action);

                                    if(mysqli_num_rows($result_check_user_action) === 0) {
                                        // Jeśli użytkownik jeszcze nie ocenił lekcji, dodaj nowy rekord oceny
                                        $query_insert_user_action = "INSERT INTO user_actions (user_id, lesson_id, action) VALUES ($user_id, $lesson_id, '$action')";
                                        mysqli_query($conn, $query_insert_user_action);
                                    
                                        // Aktualizacja liczby polubień i niepolubień w tabeli lessons
                                        if($action === 'like') {
                                            $query_update_likes = "UPDATE lessons SET likes = likes + 1 WHERE id = $lesson_id";
                                            mysqli_query($conn, $query_update_likes);
                                            // Count the total number of ratings
                                            $query_total_ratings = "SELECT COUNT(*) AS total_ratings FROM user_actions WHERE lesson_id = $lesson_id";
                                            $result_total_ratings = mysqli_query($conn, $query_total_ratings);
                                            $row_total_ratings = mysqli_fetch_assoc($result_total_ratings);
                                            $total_ratings = $row_total_ratings['total_ratings'];

                                            // Count the number of likes
                                            $query_likes = "SELECT COUNT(*) AS likes FROM user_actions WHERE lesson_id = $lesson_id AND action = 'like'";
                                            $result_likes = mysqli_query($conn, $query_likes);
                                            $row_likes = mysqli_fetch_assoc($result_likes);
                                            $likes = $row_likes['likes'];

                                            // Calculate the rating
                                            $rating = ($likes / $total_ratings) * 5;
                                            $rating = round($rating, 1);

                                            // Update the ranking in the tutors table
                                            $query_update_ranking = "UPDATE tutors SET rating = $rating WHERE id = {$lesson['tutor_id']}";
                                            mysqli_query($conn, $query_update_ranking);
                                        } else {
                                            $query_update_dislikes = "UPDATE lessons SET dislikes = dislikes + 1 WHERE id = $lesson_id";
                                            mysqli_query($conn, $query_update_dislikes);
                                            // Count the total number of ratings
                                            $query_total_ratings = "SELECT COUNT(*) AS total_ratings FROM user_actions WHERE lesson_id = $lesson_id";
                                            $result_total_ratings = mysqli_query($conn, $query_total_ratings);
                                            $row_total_ratings = mysqli_fetch_assoc($result_total_ratings);
                                            $total_ratings = $row_total_ratings['total_ratings'];

                                            // Count the number of likes
                                            $query_likes = "SELECT COUNT(*) AS likes FROM user_actions WHERE lesson_id = $lesson_id AND action = 'like'";
                                            $result_likes = mysqli_query($conn, $query_likes);
                                            $row_likes = mysqli_fetch_assoc($result_likes);
                                            $likes = $row_likes['likes'];

                                            // Calculate the rating
                                            $rating = ($likes / $total_ratings) * 5;
                                            $rating = round($rating, 1);

                                            // Update the ranking in the tutors table
                                            $query_update_ranking = "UPDATE tutors SET rating = $rating WHERE id = {$lesson['tutor_id']}";
                                            mysqli_query($conn, $query_update_ranking);
                                        }
                                    }
                                }
                            }
                                echo "<a href='lessons.php'>Powrót</a>";
                            } else {
                                // Jeśli lekcja nie została znaleziona, wyświetl komunikat błędu
                                echo "Błąd: Lekcja nie została znaleziona.";
                            }
                        } else {
                            // Jeśli nie został przekazany identyfikator lekcji, wyświetl komunikat błędu
                            echo "Błąd: Brak identyfikatora lekcji.";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include_once "templates/footer.php"; ?>
    </footer>
</body>
</html>
