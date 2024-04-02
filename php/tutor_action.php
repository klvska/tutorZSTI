<?php
require_once "config.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION["username"])) {
    echo "<script>alert('You must be logged in to access this page')</script>";
    header("location: ./login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
    $check = "SELECT * FROM tutors WHERE user_id = '" . $_SESSION["user_id"] . "'";
    $result = $conn->query($check);
    if ($result->num_rows > 0) {
        $errors[] = 'tutor already exists.';
    }
    if(empty($errors)){
    $user_id = $_SESSION["user_id"];
    $f_name = $_POST["f_name"];
    $s_name = $_POST["s_name"];
    $subject = $_POST["subject"];
    $skype = $_POST["skype"];
    $discord = $_POST["discord"];
    $teams = $_POST["teams"];
    $topics = $_POST["topics"];
    $about_me = $_POST["about_me"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tutors (user_id, f_name, s_name, subject, skype, discord, teams, topics, about_me) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issssssss", $user_id, $f_name, $s_name, $subject, $skype, $discord, $teams, $topics, $about_me);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo "<script>" . $error . "<br></script>";
            header("Location: ../tutor.php");
        }
    }
}

// Close the connection
$conn->close();
?>