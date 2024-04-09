<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/icons/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
</head>
    <title>Tutor ZSTI</title>
</head>
<body>
<header>
    <?php include "templates/nav.php" ?>
</header>
<main>
<div class="profile">
    <div class="container">
        <div class="profile-content">
            <div class="profile-infos">
                <div class="profile-img">
                <img src="assets/images/default-profile.png" alt="profile-img">
                </div>
            <?php
                include_once "php/config.php";

                    $user_id = $_SESSION["user_id"];
                    $query = "SELECT * FROM tutors WHERE user_id = $user_id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $f_name = $row["f_name"];
                            $s_name = $row["s_name"];
                            $skype = $row["skype"];
                            $discord = $row["discord"];
                            $teams = $row["teams"];
                            $_SESSION["tutor_id"] = $row["id"];
                        
                            echo "<div class='profile-info'>";
                            echo "<h3>Informacje</h3>";
                            echo "<p>imie: $f_name</p>";
                            echo "<p>nazwisko: $s_name</p>";
                            if ($skype !== null) {
                                echo "<p><img src='assets/images/skype.png'><span>" .  $skype . "</span></p>";
                            }
                            if ($discord !== null) {
                                echo "<p><img src='assets/images/discord.png'><span>" .  $discord . "</span></p>";
                            }
                            if ($teams !== null) {
                                echo "<p><img src='assets/images/teams.png'><span>" .  $teams . "</span></p>";
                            }
                            echo "</div>";
                        }
                    } else{
                        $query = "SELECT * FROM users WHERE UserID = $user_id";
                        $result = mysqli_query($conn, $query);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $username = $row["Username"];
                                $email = $row["Email"];
                                
                                echo "<div class='profile-info'>";
                                echo "<h3>Informacje</h3>";
                                echo "<p>Username: $username</p>";
                                echo "<p>Email: $email</p>";
                                echo "</div>";
                            }
                        } else {
                            echo "No user info found.";
                        }
                    }
        ?>
            </div>
            <div class="profile-lessons">
                <h1>Twoje lekcje: </h1>
                <div class="lesson-container">
                <?php
                    $tutor_id = $_SESSION["tutor_id"];
                    $query = "SELECT * FROM lessons WHERE tutor_id = $tutor_id";
                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $lesson_id = $row["id"];
                            $lesson_author = $row["tutor_name"] . " " . $row["tutor_surname"];
                            $lesson_title = $row["title"];
                            $lesson_date = $row["date"];
                            $lesson_subject = $row["subject"];
                            $lesson_likes = $row["likes"];
                            $lesson_dislikes = $row["dislikes"];

                            echo "<div class='lesson'>";
                            echo "<a class='lesson-card' href='lesson.php?lesson=$lesson_id'>";
                            echo "<div class='lesson-title'>";
                            echo "<h4>$lesson_title</h4>";
                            echo "<p>$lesson_subject</p>";
                            echo "</div>";
                            echo "<div class='lesson-author'>";
                            echo "<span>$lesson_author</span>";
                            echo "<p>$lesson_date</p>";
                            echo "</div>";
                            echo "<div class='lesson-likes'>";
                            echo "<p><img src='assets/icons/like.svg'>$lesson_likes</p>";
                            echo "<p><img src='assets/icons/dislike.svg'>$lesson_dislikes</p>";
                            echo "</div>";
                            echo "</a>";
                            
                            echo "<div class='edit-lesson'>";
                            echo "<a href='php/edit_lesson.php?lesson=$lesson_id'>Edytuj</a>";
                            echo "<a href='php/delete_lesson.php?lesson=$lesson_id'>Usun</a>";
                            echo "</div>";
                            echo "</div>";  
                            
                        }
                    } else {
                        echo "Brak lekcji.<br>";
                        echo "<a href='create_lesson.php'>Dodaj lekcje</a>";
                    }
                ?>
                </div>
                        <a class='add-lesson' href='create_lesson.php'>Dodaj lekcje</a>
            </div>
        </div>
    </div>
</div>
</main>


<footer>
    <?php include "templates/footer.php" ?>
</footer>
</body>
</html>