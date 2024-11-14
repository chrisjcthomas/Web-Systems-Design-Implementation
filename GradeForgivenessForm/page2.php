<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store data in session
    $_SESSION['modules'] = $_POST['modules'];
    $_SESSION['studentSignature'] = $_POST['studentSignature'];
    $_SESSION['studentDate'] = $_POST['studentDate'];
    $_SESSION['advisorSignature'] = $_POST['advisorSignature'];
    $_SESSION['advisorDate'] = $_POST['advisorDate'];
    $_SESSION['directorSignature'] = $_POST['directorSignature'];
    $_SESSION['directorDate'] = $_POST['directorDate'];
    $_SESSION['adminSignature'] = $_POST['adminSignature'];
    $_SESSION['adminDate'] = $_POST['adminDate'];

    // Redirect to the report page
    header('Location: report.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Module Information</title>
</head>
<body>
    <h2>Module Information</h2>
    <form method="POST" action="page2.php">
        <table border="1">
            <tr>
                <th>Module Name</th>
                <th>Module Code</th>
                <th>Academic Year</th>
                <th>Academic Session</th>
                <th>Initial Grade</th>
                <th>Decision by PD/HOD</th>
                <th>Comment/Signature</th>
            </tr>
            <!-- Allow the user to input multiple modules -->
            <?php for ($i = 0; $i < 4; $i++): ?>
            <tr>
                <td><input type="text" name="modules[<?php echo $i; ?>][name]" <?php echo $i === 0 ? 'required' : ''; ?>></td>
                <td><input type="text" name="modules[<?php echo $i; ?>][code]" <?php echo $i === 0 ? 'required' : ''; ?>></td>
                <td><input type="text" name="modules[<?php echo $i; ?>][year]" <?php echo $i === 0 ? 'required' : ''; ?>></td>
                <td><input type="text" name="modules[<?php echo $i; ?>][session]" <?php echo $i === 0 ? 'required' : ''; ?>></td>
                <td><input type="text" name="modules[<?php echo $i; ?>][grade]" <?php echo $i === 0 ? 'required' : ''; ?>></td>
                <td>
                    <select name="modules[<?php echo $i; ?>][decision]">
                        <option value="Approved">Approved</option>
                        <option value="Denied">Denied</option>
                    </select>
                </td>
                <td><input type="text" name="modules[<?php echo $i; ?>][comment]"></td>
            </tr>
            <?php endfor; ?>
        </table>

        <h2>Signatures</h2>
        <!-- Student's Name & Date -->
        <label for="studentSignature">Student's Name:</label>
        <input type="text" name="studentSignature" id="studentSignature" required>
        <label for="studentDate">Date:</label>
        <input type="date" name="studentDate" id="studentDate" required><br><br>

        <!-- Advisor's Name & Date -->
        <label for="advisorSignature">Advisor's Name:</label>
        <input type="text" name="advisorSignature" id="advisorSignature">
        <label for="advisorDate">Date:</label>
        <input type="date" name="advisorDate" id="advisorDate"><br><br>

        <!-- Programme Director's Name & Date -->
        <label for="directorSignature">Programme Director's Name:</label>
        <input type="text" name="directorSignature" id="directorSignature">
        <label for="directorDate">Date:</label>
        <input type="date" name="directorDate" id="directorDate"><br><br>

        <!-- Administrator's Name & Date -->
        <label for="adminSignature">Processed by (College/Faculty Administrator):</label>
        <input type="text" name="adminSignature" id="adminSignature">
        <label for="adminDate">Date:</label>
        <input type="date" name="adminDate" id="adminDate"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
