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
    <div class="login-container">
        <div class="container">
            <div class="login-form-content">
                <div class="login-img">
                    <img src="assets/images/image0_0 1.png" alt="login-img">
                </div>
                <div class="login-form">
                    <h1>Zaloguj sie</h1>
                <form action="php/login_action.php" method="post">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required placeholder="twoj email*">
                        <label for="password">Haslo:</label>
                        <input type="password" id="password" name="password" required placeholder="twoje haslo*">
                        <input type="submit" value="Zaloguj">
                        <p>Nie posiadasz konta? <a href="register.php">Zarejestruj sie</a></p>
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