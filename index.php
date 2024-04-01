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
                <h1>przestan byc <br> nieukiem</h1>
                <a href="#" class="banner-btn">
                    <span>
                        Szukaj korepetycji
                        <?php echo file_get_contents("assets/icons/arrow-right-large.svg"); ?>
                    </span>
                </a>
            </div>
            <div class="banner-img">
                <img src="assets/images/tutors-hero@2x 1.png" alt="banner-img">
            </div>
        </div>
    </div>
</div>
<?php
    $subjects = [
    "Math" => [
        "icon" => "./assets/icons/calculator.png",
        "name" => "Matematyka",
    ],
    "Polish" => [
        "icon" => "./assets/icons/book-closed.png",
        "name" => "J.Polski",
    ],
    "English" => [
        "icon" => "./assets/icons/book-closed.png",
        "name" => "J.Angielski",
    ],
    "Chemistry" => [
        "icon" => "./assets/icons/beaker-01.png",
        "name" => "Chemia",
    ],
    "Physics" => [
        "icon" => "./assets/icons/atom-01.png",
        "name" => "Fizyka",
    ],
    "Science" => [
        "icon" => "./assets/icons/microscope.png",
        "name" => "Biologia",
    ],
];
?>

<div class="subject-container">
    <div class="container">
        <div class="subject-content">
            <div class="subject-list">
                <?php foreach ($subjects as $key => $subject) : ?>
                    <a href="subject.php?subject=<?php echo $key; ?>" class="subject-item">
                        <img src="<?php echo $subject['icon']; ?>" alt="subject-icon">
                        <span><?php echo $subject['name']; ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
                <a href="subjects.php" class="more-btn">
                    <span>
                        <?php echo file_get_contents("assets/icons/plus.svg"); ?>
                        wiecej
                    </span>
                </a>
        </div>
    </div>
</div>
</main>


<footer>
    <?php include "templates/footer.php" ?>
</footer>
</body>
</html>