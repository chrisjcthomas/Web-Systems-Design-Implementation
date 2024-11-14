<?php
require 'db_connect.php'; // Connect to the database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Generate unique username (e.g., first part of email + random number)
    $username = substr($email, 0, strpos($email, '@')) . rand(100, 999);

    // Encrypt the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into the members table
    $sql = "INSERT INTO members (name, email, username, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $username, $hashed_password);

    if ($stmt->execute()) {
        echo "Registration successful. Your username is: $username";
        // Optionally, send a confirmation email here
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
    $conn->close();
}
?>
