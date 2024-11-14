<!-- SCITlogin.php -->
<?php
session_start();

// Define default credentials
$default_username = 'SCITadmin';
$default_password = 'SCITpages123';

// Initialize variables
$username = '';
$error = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate credentials
    if ($username === $default_username && $password === $default_password) {
        $_SESSION['loggedin'] = true;
        header('Location: SCITaddStudentsRec.php');
        exit();
    } else {
        $error = 'Invalid username or password.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SCIT Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login to SCIT Management System</h2>
        <?php
            if (!empty($error)) {
                echo '<div class="error">' . htmlspecialchars($error) . '</div>';
            }
        ?>
        <form action="SCITlogin.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
