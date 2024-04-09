<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Lekcje</title>
</head>
<body>
    <header>
        <?php include_once "templates/nav.php" ?>
    </header>
    <main>
        <div class="lessons-container">
            <div class="container">
                <div class="lesson-table">


    <?php
        include_once "php/config.php";

        // Get the subject filter and sort order from the URL parameters
        $subject_filter = isset($_GET['subject']) ? $_GET['subject'] : '';
        $sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc';

        // Build the SQL query based on the subject filter and sort order
        $query = "SELECT * FROM lessons";
        $filters = [];

        if (!empty($subject_filter)) {
            $filters[] = "subject = '$subject_filter'";
        }

        if (!empty($filters)) {
            $query .= " WHERE " . implode(" AND ", $filters);
        }

        $query .= " ORDER BY date " . $sort_order;

        $result = mysqli_query($conn, $query);

        // Display the table with the lesson information
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr>
                    <th>Tytul</th>
                    <th>Autor</th>
                    <th>Przedmiot 
                    <select name='subject' onchange=\"location = 'lessons.php?subject=' + this.value;\">
                        ";
                        $selected_subject = isset($_GET['subject']) ? $_GET['subject'] : '';
                        echo '<option value="" ' . ($selected_subject == '' ? 'selected' : '') . '>Wszystkie</option>';
                        echo get_subject_options($conn, $selected_subject);
                        echo "
                    </select>
                    </th>
                    <th>Data <a href='lessons.php?sort=asc'>Starsze &uarr;</a> <a href='lessons.php?sort=desc'>Nowsze &darr;</a></th>
                    <th>Likes</th>
                    <th>Dislikes</th>
                    <th>Przejdz</th>
                    </tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["tutor_name"] . " " . $row["tutor_surname"] . "</td>";
                echo "<td>" . $row["subject"] . "</td>";
                echo "<td>" . $row["date"] . "</td>";
                echo "<td><img src='assets/icons/like.svg'>" .$row['likes'] . "</td>";
                echo "<td><img src='assets/icons/dislike.svg'>" . $row['dislikes'] . "</td>";
                echo '<td><a href="lesson.php?lesson=' . $row["id"] . '">Szczególy</a></td>';
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Brak lekcji.";
        }

       // Get the subject options from the database
        function get_subject_options($conn, $selected_subject) {
            $query = "SELECT DISTINCT subject FROM lessons";
            $result = mysqli_query($conn, $query);
            $options = '';
        
            while ($row = mysqli_fetch_assoc($result)) {
                $selected = ($row["subject"] == $selected_subject) ? 'selected' : '';
                $options .= "<option value='" . $row["subject"] . "' " . $selected . ">" . $row["subject"] . "</option>";
            }
        
            return $options;
        }

    ?>
                    </div>
            </div>
        </div>
    </main>
    <footer>
        <?php include_once "templates/footer.php" ?>
    </footer>
</body>
</html>