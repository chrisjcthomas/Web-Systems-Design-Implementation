
<?php
session_start();

// Simulating hard-coded valid login credentials for demo purposes
$valid_usr = "admin@example.com";
$valid_pw = "password123";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $usr = filter_var($_POST['usr'], FILTER_SANITIZE_EMAIL);
    $pw = filter_var($_POST['pw'], FILTER_SANITIZE_STRING);

    // Validate email and password
    if (empty($usr) || empty($pw)) {
        echo "Both fields are required.";
    } elseif (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } elseif ($usr === $valid_usr && $pw === $valid_pw) {
        // Redirect to the form page if successful
        header("Location: form.php");
        exit();
    } else {
        echo "Invalid login credentials. Please try again.";
    }
}
?>
