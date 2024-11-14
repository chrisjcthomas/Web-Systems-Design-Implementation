<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to store errors
    $errors = [];

    // Sanitize and validate inputs
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $website = trim($_POST["website"]);
    $message = trim($_POST["message"]);

    if (empty($name)) {
        $errors['name'] = "Full name is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        $errors['phone'] = "Phone number must be between 10 to 15 digits";
    }

    if (!filter_var($website, FILTER_VALIDATE_URL)) {
        $errors['website'] = "Invalid URL format";
    }

    if (empty($message)) {
        $errors['message'] = "Message is required";
    }

    // If there are no errors, process the form data
    if (empty($errors)) {
        echo "Form submitted successfully!";
        // You can further process data like sending an email or storing it in the database
    } else {
        // If there are errors, include the form and display errors
        foreach ($errors as $key => $error) {
            echo "<p style='color: red;'>$error</p>";
        }
        include 'form.php';  // Re-display the form with errors and previously entered data
    }
}
