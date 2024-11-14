<?php
// Start the session
session_start();

// Initialize an empty array for error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate full name
    if (empty($_POST["fullname"])) {
        $errors[] = "Full Name is required.";
    }

    // Validate email
    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid Email is required.";
    }

    // Validate contact number
    if (empty($_POST["contact"])) {
        $errors[] = "Contact number is required.";
    }

    // Validate passwords match
    if (empty($_POST["password"]) || $_POST["password"] !== $_POST["repassword"]) {
        $errors[] = "Passwords do not match.";
    }

    // If no errors, save the data to the session and proceed
    if (empty($errors)) {
        $_SESSION["fullname"] = $_POST["fullname"];
        $_SESSION["email"] = $_POST["email"];
        $_SESSION["contact"] = $_POST["contact"];
        $_SESSION["password"] = $_POST["password"];
        header("Location: page2.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page 1</title>
    <style>
        /* Styling */
    </style>
    <script>
        function validateForm() {
            var password = document.getElementById('password').value;
            var repassword = document.getElementById('repassword').value;

            if (password !== repassword) {
                alert("Passwords do not match!");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <div class="form-box">
        <h2>User Information</h2>
        
        <!-- Display errors if any -->
        <?php if (!empty($errors)) : ?>
            <div class="error-box">
                <ul>
                    <?php foreach ($errors as $error) : ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form action="page1.php" method="POST" onsubmit="return validateForm();">
            <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullname" name="fullname" value="<?php echo isset($_POST['fullname']) ? htmlspecialchars($_POST['fullname']) : ''; ?>" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required><br><br>

            <label for="contact">Contact:</label><br>
            <input type="text" id="contact" name="contact" value="<?php echo isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : ''; ?>" required><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br><br>

            <label for="repassword">Re-enter Password:</label><br>
            <input type="password" id="repassword" name="repassword" required><br><br>

            <input type="submit" value="Next">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>

