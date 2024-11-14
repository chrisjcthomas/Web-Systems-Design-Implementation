
<?php
session_start();

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $bio = filter_var($_POST['bio'], FILTER_SANITIZE_STRING);
    $gender = $_POST['gender'];
    $mstatus = $_POST['mstatus'];
    $password = $_POST['pw'];

    // Validate inputs
    if (empty($email) || empty($gender) || empty($mstatus) || empty($password)) {
        echo "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
    } else {
        // Additional validations like password strength can be added here
        echo "Registration successful.";
    }
}
?>
