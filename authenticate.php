<?php

// Retrieve and sanitize user inputs
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

// Define the correct credentials
$correct_username = "tricky";
$correct_password = "platform";

// Initialize variables for message
$message = "";
$message_class = "";

// Authenticate user
if ($username === $correct_username && $password === $correct_password) {
    // Successful authentication
    $message = "Welcome! You have been successfully authorized to use the system.";
    $message_class = "success";
} else {
    // Failed authentication
    $message = "Authorization failed. Please check your username and password and try again.";
    $message_class = "error";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Status</title>
    <style>
        /* Reuse the same styling as the login form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }
        .status-box {
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .status-box h2 {
            margin-bottom: 25px;
            color: #333;
        }
        .message {
            padding: 15px;
            border-radius: 4px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .status-box a {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #4285F4;
            font-weight: bold;
        }
        .status-box a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="status-box">
        <h2>Login Status</h2>
        <div class="message <?php echo htmlspecialchars($message_class); ?>">
            <?php echo htmlspecialchars($message); ?>
        </div>
        <a href="1800904_LoginForm.html">Return to Login</a>
    </div>
</body>
</html>
