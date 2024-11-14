<?php
// Start the session
session_start();

// Initialize an empty array for error messages
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate religion
    if (empty($_POST["religion"])) {
        $errors[] = "Religion is required.";
    }

    // Validate nationality
    if (empty($_POST["nationality"])) {
        $errors[] = "Nationality is required.";
    }

    // Validate gender
    if (empty($_POST["gender"])) {
        $errors[] = "Gender is required.";
    }

    // Validate education
    if (empty($_POST["education"])) {
        $errors[] = "Educational Qualification is required.";
    }

    // Validate experience
    if (empty($_POST["experience"])) {
        $errors[] = "Job Experience is required.";
    }

    // If no errors, save the data to the session and proceed
    if (empty($errors)) {
        $_SESSION["religion"] = $_POST["religion"];
        $_SESSION["nationality"] = $_POST["nationality"];
        $_SESSION["gender"] = $_POST["gender"];
        $_SESSION["education"] = $_POST["education"];
        $_SESSION["experience"] = $_POST["experience"];
        header("Location: page3.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Page 2</title>
    <style>
        /* Styling */
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Personal Information</h2>
        
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

        <form action="page2.php" method="POST">
            <label for="religion">Religion:</label><br>
            <input type="text" id="religion" name="religion" value="<?php echo isset($_POST['religion']) ? htmlspecialchars($_POST['religion']) : ''; ?>" required><br><br>

            <label for="nationality">Nationality:</label><br>
            <input type="text" id="nationality" name="nationality" value="<?php echo isset($_POST['nationality']) ? htmlspecialchars($_POST['nationality']) : ''; ?>" required><br><br>

            <label for="gender">Gender:</label><br>
            <select id="gender" name="gender" required>
                <option value="male" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'male') ? 'selected' : ''; ?>>Male</option>
                <option value="female" <?php echo (isset($_POST['gender']) && $_POST['gender'] === 'female') ? 'selected' : ''; ?>>Female</option>
            </select><br><br>

            <label for="education">Educational Qualification:</label><br>
            <select id="education" name="education" required>
                <option value="highschool" <?php echo (isset($_POST['education']) && $_POST['education'] === 'highschool') ? 'selected' : ''; ?>>High School</option>
                <option value="bachelor" <?php echo (isset($_POST['education']) && $_POST['education'] === 'bachelor') ? 'selected' : ''; ?>>Bachelor's Degree</option>
                <option value="master" <?php echo (isset($_POST['education']) && $_POST['education'] === 'master') ? 'selected' : ''; ?>>Master's Degree</option>
            </select><br><br>

            <label for="experience">Job Experience:</label><br>
            <select id="experience" name="experience" required>
                <option value="none" <?php echo (isset($_POST['experience']) && $_POST['experience'] === 'none') ? 'selected' : ''; ?>>None</option>
                <option value="1-3" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '1-3') ? 'selected' : ''; ?>>1-3 Years</option>
                <option value="3-5" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '3-5') ? 'selected' : ''; ?>>3-5 Years</option>
                <option value="5+" <?php echo (isset($_POST['experience']) && $_POST['experience'] === '5+') ? 'selected' : ''; ?>>5+ Years</option>
            </select><br><br>

            <input type="submit" value="Next">
            <input type="reset" value="Reset">
        </form>
    </div>
</body>
</html>

