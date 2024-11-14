<!-- SCITdisplay.php -->
<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: SCITlogin.php');
    exit();
}

// Retrieve student data from session
$student = $_SESSION['student'] ?? null;

if (!$student) {
    header('Location: SCITaddStudentsRec.php');
    exit();
}

// Prepare data for display and storage
$id = htmlspecialchars($student['id']);
$title = htmlspecialchars($student['title']);
$firstName = htmlspecialchars($student['firstName']);
$lastName = htmlspecialchars($student['lastName']);
$age = htmlspecialchars($student['age']);
$photo = htmlspecialchars($student['photo']);
$programme = htmlspecialchars($student['programme']);
$major = htmlspecialchars($student['major']);
$modules = htmlspecialchars($student['modules']);

// Save data to SCITStudentsdata.txt
$dataLine = "$id,$title,$firstName,$lastName,$age,$photo,$programme,$major,$modules\n";
$file = 'SCITStudentsdata.txt';
file_put_contents($file, $dataLine, FILE_APPEND);

// Optionally, unset session data after saving
unset($_SESSION['student']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Information</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .photo {
            width: 100px;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Information</h2>
        <table>
            <tr>
                <th>ID</th>
                <td><?php echo $id; ?></td>
            </tr>
            <tr>
                <th>Title</th>
                <td><?php echo $title; ?></td>
            </tr>
            <tr>
                <th>First Name</th>
                <td><?php echo $firstName; ?></td>
            </tr>
            <tr>
                <th>Last Name</th>
                <td><?php echo $lastName; ?></td>
            </tr>
            <tr>
                <th>Age</th>
                <td><?php echo $age; ?></td>
            </tr>
            <tr>
                <th>Photo</th>
                <td><img src="uploads/<?php echo $photo; ?>" alt="Student Photo" class="photo"></td>
            </tr>
            <tr>
                <th>Programme</th>
                <td><?php echo $programme; ?></td>
            </tr>
            <tr>
                <th>Major</th>
                <td><?php echo $major; ?></td>
            </tr>
            <tr>
                <th>Number of Modules</th>
                <td><?php echo $modules; ?></td>
            </tr>
        </table>
        <p><a href="SCITaddStudentsRec.php">Add Another Student</a></p>
    </div>
</body>
</html>
