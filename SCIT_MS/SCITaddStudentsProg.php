<!-- SCITaddStudentsProg.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: SCITlogin.php');
    exit();
}

// Retrieve student data from session
$student = $_SESSION['student'] ?? null;

if (!$student) {
    // Handle missing student data
    header('Location: SCITaddStudentsRec.php');
    exit();
}

$id = htmlspecialchars($student['id']); // Securely escape output
$programme = $_GET['programme'] ?? '';
$major = $_GET['major'] ?? '';
$modules = $_GET['modules'] ?? '';

// Handle error messages correctly
$error_messages = [];
if (isset($_GET['error_messages'])) {
    if (is_array($_GET['error_messages'])) {
        $error_messages = $_GET['error_messages'];
    } else {
        $error_messages = [$_GET['error_messages']];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student Programme</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Student's Programme Information</h2>
        
        <!-- Display Error Messages if Any -->
        <?php
            if (!empty($error_messages)) {
                echo '<div class="error">';
                foreach ($error_messages as $error) {
                    echo '<p>' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
            }
        ?>
        
        <!-- Programme Information Form -->
        <form action="SCITaddStudentsProg_validate.php" method="POST">
            <!-- Display Student ID as Read-Only Input -->
            <label for="id">Student ID:</label>
            <input type="text" id="id" name="id" value="<?php echo $id; ?>" readonly>
    
            <!-- Hidden field to pass the ID for backend processing (redundant if 'id' is already being passed as a read-only field) -->
            <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
    
            <label for="programme">Programme:</label>
            <select id="programme" name="programme" required>
                <option value="">Select Programme</option>
                <option value="CIS" <?php if($programme=='CIS') echo 'selected'; ?>>CIS</option>
                <option value="CNS" <?php if($programme=='CNS') echo 'selected'; ?>>CNS</option>
                <option value="Animation" <?php if($programme=='Animation') echo 'selected'; ?>>Animation</option>
                <option value="Gaming" <?php if($programme=='Gaming') echo 'selected'; ?>>Gaming</option>
                <option value="Computing" <?php if($programme=='Computing') echo 'selected'; ?>>Computing</option>
            </select>
    
            <label for="major">Major:</label>
            <input type="text" id="major" name="major" value="<?php echo htmlspecialchars($major); ?>" required>
    
            <label for="modules">Number of Modules Taking:</label>
            <input type="number" id="modules" name="modules" value="<?php echo htmlspecialchars($modules); ?>" min="1" required>
    
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
