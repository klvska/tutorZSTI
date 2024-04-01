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
    <div class="register-container">
        <div class="container">
            <div class="register-form-content">
                <div class="register-img">
                    <img src="assets/images/image0_0 2.png" alt="register-img">
                </div>
                <div class="register-form">
                    <h1>Utworz konto</h1>
                <form action="php/register_action.php" method="post">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required placeholder="twoj email*">
                        <label for="username">Twoje imie:</label>
                        <input type="text" id="username" name="username" required placeholder="twoje imie*">
                        <label for="password">Haslo:</label>
                        <input type="password" id="password" name="password" required placeholder="twoje haslo*">
                        <div class="checkbox-container">
                        <input type="checkbox" class="hidden-checkbox" id="checkbox1">
                        <label for="checkbox1" class="styled-checkbox"></label>
                        <p>Akceptuje <a href="#"> regulamin*</a></p>
                        </div>
                        <input type="submit" value="Zarejestruj">
                </form>
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