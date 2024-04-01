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
    "Coding" => [
        "icon" => "./assets/icons/code-snippet-02.png",
        "name" => "Programowanie",
    ],
    "History" => [
        "icon" => "./assets/icons/glasses-02.png",
        "name" => "Historia",
    ],
    "Geografia" => [
        "icon" => "./assets/icons/globe-slated-02.png",
        "name" => "Geografia",
    ],
];
?>

<div class="subject-container">
    <div class="container">
        <div class="subject-content">
            <div class="subjects-list">
                <?php foreach ($subjects as $key => $subject) : ?>
                    <a href="subject.php?subject=<?php echo $key; ?>" class="subject-item">
                        <img src="<?php echo $subject['icon']; ?>" alt="subject-icon">
                        <span><?php echo $subject['name']; ?></span>
                    </a>
                <?php endforeach; ?>
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