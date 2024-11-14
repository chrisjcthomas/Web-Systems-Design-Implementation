<!-- SCITaddStudentsRec.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: SCITlogin.php');
    exit();
}

// Retrieve previously entered data if available
$id = $_GET['id'] ?? '';
$title = $_GET['title'] ?? '';
$firstName = $_GET['firstName'] ?? '';
$lastName = $_GET['lastName'] ?? '';
$age = $_GET['age'] ?? '';
$error_messages = isset($_GET['error_messages']) ? $_GET['error_messages'] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student Records</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Student's Basic Information</h2>
        <?php
            if (!empty($error_messages)) {
                echo '<div class="error">';
                foreach ($error_messages as $error) {
                    echo '<p>' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
            }
        ?>
        <form action="SCITaddStudentsRec_validate.php" method="POST" enctype="multipart/form-data">
            <label for="id">Student ID:</label>
            <input type="text" id="id" name="id" value="<?php echo htmlspecialchars($id); ?>" required>

            <label for="title">Title:</label>
            <select id="title" name="title" required>
                <option value="">Select Title</option>
                <option value="Mr" <?php if($title=='Mr') echo 'selected'; ?>>Mr</option>
                <option value="Ms" <?php if($title=='Ms') echo 'selected'; ?>>Ms</option>
                <option value="Mrs" <?php if($title=='Mrs') echo 'selected'; ?>>Mrs</option>
                <option value="Dr" <?php if($title=='Dr') echo 'selected'; ?>>Dr</option>
            </select>

            <label for="firstName">First Name:</label>
            <input type="text" id="firstName" name="firstName" value="<?php echo htmlspecialchars($firstName); ?>" required>

            <label for="lastName">Last Name:</label>
            <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" required>

            <label for="age">Age:</label>
            <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($age); ?>" min="16" max="100" required>

            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>

            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>
