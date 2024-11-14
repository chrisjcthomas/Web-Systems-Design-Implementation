<?php
// Start the session
session_start();

// Initialize an empty array for error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate address1
    if (empty($_POST["address1"])) {
        $errors[] = "Address 1 is required.";
    }

    // Validate city
    if (empty($_POST["city"])) {
        $errors[] = "City is required.";
    }

    // Validate pin code
    if (empty($_POST["pincode"]) || !is_numeric($_POST["pincode"])) {
        $errors[] = "A valid Pin Code is required.";
    }

    // Validate state
    if (empty($_POST["state"])) {
        $errors[] = "State is required.";
    }

    // If no errors, save the data to the session and proceed
    if (empty($errors)) {
        $_SESSION["address1"] = $_POST["address1"];
        $_SESSION["address2"] = $_POST["address2"];
        $_SESSION["city"] = $_POST["city"];
        $_SESSION["pincode"] = $_POST["pincode"];
        $_SESSION["state"] = $_POST["state"];
        header("Location: report.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page 3</title>
    <style>
        /* Styling */
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Address Information</h2>
        
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

        <form action="page3.php" method="POST">
            <label for="address1">Address 1:</label><br>
            <input type="text" id="address1" name="address1" value="<?php echo isset($_POST['address1']) ? htmlspecialchars($_POST['address1']) : ''; ?>" required><br><br>

            <label for="address2">Address 2:</label><br>
            <input type="text" id="address2" name="address2" value="<?php echo isset($_POST['address2']) ? htmlspecialchars($_POST['address2']) : ''; ?>"><br><br>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" value="<?php echo isset($_POST['city']) ? htmlspecialchars($_POST['city']) : ''; ?>" required><br><br>

            <label for="pincode">Pin Code:</label><br>
            <input type="text" id="pincode" name="pincode" value="<?php echo isset($_POST['pincode']) ? htmlspecialchars($_POST['pincode']) : ''; ?>" required><br><br>

            <label for="state">State:</label><br>
            <input type="text" id="state" name="state" value="<?php echo isset($_POST['state']) ? htmlspecialchars($_POST['state']) : ''; ?>" required><br><br>

            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>
