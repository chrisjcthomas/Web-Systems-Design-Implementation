<?php
// Start session
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
</head>
<body>
    <h1>Student Report</h1>

    <h2>Student Information</h2>
    <p><strong>Student Name:</strong> <?php echo htmlspecialchars($_SESSION['studentName']); ?></p>
    <p><strong>Student ID:</strong> <?php echo htmlspecialchars($_SESSION['studentID']); ?></p>
    <p><strong>Course of Study:</strong> <?php echo htmlspecialchars($_SESSION['courseOfStudy']); ?></p>
    <p><strong>Course Code:</strong> <?php echo htmlspecialchars($_SESSION['courseCode']); ?></p>
    <p><strong>Major:</strong> <?php echo htmlspecialchars($_SESSION['major']); ?></p>
    <p><strong>Minor:</strong> <?php echo htmlspecialchars($_SESSION['minor']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($_SESSION['phone']); ?></p>
    <p><strong>Academic Year:</strong> <?php echo htmlspecialchars($_SESSION['academicYear']); ?></p>
    <p><strong>Semester:</strong> <?php echo htmlspecialchars($_SESSION['semester']); ?></p>
    <p><strong>Campus:</strong> <?php echo htmlspecialchars($_SESSION['campus']); ?></p>

    <h2>Module Information</h2>
    <table border="1">
        <tr>
            <th>Module Name</th>
            <th>Module Code</th>
            <th>Academic Year</th>
            <th>Academic Session</th>
            <th>Initial Grade</th>
            <th>Decision</th>
            <th>Comment</th>
        </tr>
        <?php foreach ($_SESSION['modules'] as $module): ?>
        <?php if (!empty($module['name'])): ?>
        <tr>
            <td><?php echo htmlspecialchars($module['name']); ?></td>
            <td><?php echo htmlspecialchars($module['code']); ?></td>
            <td><?php echo htmlspecialchars($module['year']); ?></td>
            <td><?php echo htmlspecialchars($module['session']); ?></td>
            <td><?php echo htmlspecialchars($module['grade']); ?></td>
            <td><?php echo htmlspecialchars($module['decision']); ?></td>
            <td><?php echo htmlspecialchars($module['comment']); ?></td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
    </table>

    <h2>Signatures and Dates</h2>
    <p><strong>Student's Name:</strong> <?php echo htmlspecialchars($_SESSION['studentSignature']); ?></p>
    <p><strong>Student's Date:</strong> <?php echo htmlspecialchars($_SESSION['studentDate']); ?></p>

    <?php if (!empty($_SESSION['advisorSignature'])): ?>
        <p><strong>Advisor's Name:</strong> <?php echo htmlspecialchars($_SESSION['advisorSignature']); ?></p>
        <p><strong>Advisor's Date:</strong> <?php echo htmlspecialchars($_SESSION['advisorDate']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['directorSignature'])): ?>
        <p><strong>Programme Director's Name:</strong> <?php echo htmlspecialchars($_SESSION['directorSignature']); ?></p>
        <p><strong>Programme Director's Date:</strong> <?php echo htmlspecialchars($_SESSION['directorDate']); ?></p>
    <?php endif; ?>

    <?php if (!empty($_SESSION['adminSignature'])): ?>
        <p><strong>Processed by (College/Faculty Administrator):</strong> <?php echo htmlspecialchars($_SESSION['adminSignature']); ?></p>
        <p><strong>Administrator's Date:</strong> <?php echo htmlspecialchars($_SESSION['adminDate']); ?></p>
    <?php endif; ?>

</body>
</html>
