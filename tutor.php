<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/icons/favicon.ico">
    <title>Tutor ZSTI</title>
</head>
<body>
<header>
    <?php include "templates/nav.php" ?>
</header>
<main>
    <div class="banner">
        <div class="container">
            <div class="banner-content">
            <div class="banner-text">
                <h1>dolacz <br> do zespolu <br> korepetytorow</h1>
            </div>
            <div class="banner-img">
                <img src="assets/images/banner2.png" alt="banner-img">
            </div>
        </div>
    </div>
</div>
<div class="tutor-form-container">
    <div class="container">
        <div class="tutor-form-content">
            <form class="tutor-form" action="php/tutor_action.php" method="POST">
                <div class="form-group">
                    <label for="f_name">Imie</label>
                    <input type="text" id="f_name" name="f_name"  required>
                    <label for="s_name">Nazwisko</label>
                    <input type="text" id="s_name" name="s_name" required>
                    <label for="subject">Przedmiot</label>
                    <select id="subject" name="subject" required>
                        <option value="math">Matematyka</option>
                        <option value="english">Angielski</option>
                        <option value="polish">Polski</option>
                        <option value="history">Historia</option>
                        <option value="science">Biologia</option>
                        <option value="chemistry">Chemia</option>
                        <option value="geography">Geografia</option>
                        <option value="coding">Programowanie</option>
                        <option value="physics">Fizyka</option>
                    </select>
                    <label for="communicator">komunikator <span>(minimum 1)</span></label>
                    <div class="communicator-container">
                        <label class="communicator">
                            <img src="assets/images/skype.png" alt="Skype">
                            <input type="text" name="skype" placeholder="Skype">
                        </label>
                        <label class="communicator">
                            <img src="assets/images/discord.png" alt="Discord">
                            <input type="text" name="discord" placeholder="Discord">
                        </label>
                        <label class="communicator">
                            <img src="assets/images/teams.png" alt="Teams">
                            <input type="text" name="teams" placeholder="Teams">
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="topics">Tematy <span>(po kropce)</span></label>
                    <textarea id="topics" name="topics" placeholder="Równania kwadratowe i funkcje kwadratowe ..." required maxlength="250"></textarea>
                </div>
                <div class="form-group">
                    <label for="about_me">Przedstaw sie</label>
                    <textarea id="about_me" name="about_me" placeholder="Czesc! Jestem [Imie], uczniem z pasja do ..." required maxlength="250"></textarea>
                    <input class="tutor-submit" type="submit" value="Zostan korepetytorem">
                </div>
            </form>
        </div>
    </div>
</div>
</main>


<footer>
    <?php include "templates/footer.php" ?>
</footer>
</body>
</html>