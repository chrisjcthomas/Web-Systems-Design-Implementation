<?php
session_start();
require 'config/db.php';
require 'src/Auth.php';

$auth = new Auth($pdo);

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// For testing purposes: Display OTP (remove this in production)
$otpMessage = "<p>Your OTP is: " . $_SESSION['otp'] . "</p>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $otp = $_POST['otp'];

    if ($auth->verifyOTP($otp)) {
        // Redirect to the user's role-based dashboard
        $redirectUrl = $auth->getRedirectUrl();
        header("Location: $redirectUrl");
        exit();
    } else {
        $error = "Invalid OTP. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Verify OTP</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="container d-flex justify-content-between align-items-center">
        <h5>adWebApp</h5>
        <a href="logout.php" class="text-white">Logout</a>
    </div>
</header>

<div class="container card-center">
    <div class="card">
        <h3 class="text-center">Enter OTP</h3>
        <form method="POST" action="verify_otp.php">
            <div class="form-group">
                <input type="text" name="otp" class="form-control" required placeholder="Enter OTP">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Verify</button>
        </form>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mt-3"><?php echo $error; ?></div>
        <?php endif; ?>
    </div>
</div>

<div class="container text-center mt-4">
    <?php echo $otpMessage; ?>
</div>

<footer>
    <p>&copy; 2024 adWebApp. All Rights Reserved.</p>
</footer>

</body>
</html>
