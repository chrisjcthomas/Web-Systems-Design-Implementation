<?php
// Start session
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Store data in session
    $_SESSION['studentName'] = $_POST['studentName'];
    $_SESSION['studentID'] = $_POST['studentID'];
    $_SESSION['courseOfStudy'] = $_POST['courseOfStudy'];
    $_SESSION['courseCode'] = $_POST['courseCode'];
    $_SESSION['major'] = $_POST['major'];
    $_SESSION['minor'] = $_POST['minor'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['phone'] = $_POST['phone'];
    $_SESSION['academicYear'] = $_POST['academicYear'];
    $_SESSION['semester'] = $_POST['semester'];
    $_SESSION['campus'] = $_POST['campus'];

    // Redirect to page 2
    header('Location: page2.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
</head>
<body>
    <h2>Student Information</h2>
    <form method="POST" action="page1.php">
        <label for="studentName">Student Name:</label>
        <input type="text" name="studentName" id="studentName" required><br><br>

        <label for="studentID">Student ID:</label>
        <input type="text" name="studentID" id="studentID" required><br><br>

        <label for="courseOfStudy">Course of Study:</label>
        <input type="text" name="courseOfStudy" id="courseOfStudy" required><br><br>

        <label for="courseCode">Course Code:</label>
        <input type="text" name="courseCode" id="courseCode" required><br><br>

        <label for="major">Major:</label>
        <input type="text" name="major" id="major"><br><br>

        <label for="minor">Minor:</label>
        <input type="text" name="minor" id="minor"><br><br>

        <label for="email">Email Address:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="phone">Phone #:</label>
        <input type="text" name="phone" id="phone" required><br><br>

        <label for="academicYear">Academic Year:</label>
        <input type="text" name="academicYear" id="academicYear" required><br><br>

        <label for="semester">Semester:</label>
        <input type="text" name="semester" id="semester" required><br><br>

        <label for="campus">Campus:</label>
        <input type="text" name="campus" id="campus" required><br><br>

        <input type="submit" value="Next">
    </form>
</body>
</html>
