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
        <div id="calendar"></div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
            <script src="script.js"></script>
        </div>
    </div>
</div>
</main>


<footer>
    <?php include "templates/footer.php" ?>
</footer>
</body>
</html>