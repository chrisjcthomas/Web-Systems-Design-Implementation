<?php
// Start session
session_start();

// Define valid credentials
$valid_credentials = [
    'student' => '240825',
    'admin' => '240825',
];

// Check if the form is submitted
$login_error = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists and password is correct
    if (array_key_exists($username, $valid_credentials) && $valid_credentials[$username] === $password) {
        // Set session role and redirect based on the user role
        $_SESSION['role'] = $username;
        if ($username === 'student') {
            header('Location: student_dashboard.php');
        } elseif ($username === 'admin') {
            header('Location: admin_dashboard.php');
        }
        exit;
    } else {
        // If the credentials are wrong, set an error message
        $login_error = 'Invalid username or password. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        .login-container h1 {
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: bold;
            color: #333;
        }

        .form-control {
            border-radius: 30px;
            padding: 15px;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
            border-radius: 30px;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #357ABD;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .custom-footer {
            margin-top: 20px;
            font-size: 12px;
            color: #aaa;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h1>Sign In</h1>

        <!-- Display error message if login fails -->
        <?php if ($login_error): ?>
            <div class="error-message"><?= $login_error ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>

        <div class="custom-footer">
            <p>© 2024 Your Company Name. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
