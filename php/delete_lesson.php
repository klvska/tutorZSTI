<?php
require_once 'config.php';

// Get the lesson ID from the URL parameter
$lesson_id = $_GET['lesson'];

// Delete the user actions for the lesson in the database
$sql = "DELETE FROM user_actions WHERE lesson_id = $lesson_id";

if (mysqli_query($conn, $sql)) {
    // Delete the lesson in the database
    $sql = "DELETE FROM lessons WHERE id = $lesson_id";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        header("Location: ../success.php");
    } else {
        echo "Error deleting lesson: " . mysqli_error($conn);
    }
} else {
    echo "Error deleting user actions: " . mysqli_error($conn);
}
?>