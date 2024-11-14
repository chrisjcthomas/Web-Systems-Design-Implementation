<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    die('Access denied');
}

$filename = 'grade_forgiveness.txt';

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Handle file deletion (delete all records)
if (isset($_POST['delete_file'])) {
    if (file_exists($filename)) {
        unlink($filename);  // Delete the file
        $message = "Grade forgiveness records deleted successfully!";
    } else {
        $message = "File not found!";
    }
}

// Handle deletion of individual records
if (isset($_POST['delete_record'])) {
    $record_number = $_POST['record_number'];
    $student_id = $_POST['student_id'];

    // Read all records from the file
    $file_data = file($filename);
    $new_data = [];
    foreach ($file_data as $line) {
        $line_data = str_getcsv($line);
        if (strpos($line_data[0], $student_id . '_' . $record_number) === false) {
            $new_data[] = $line; // Keep the records that don't match the record to be deleted
        }
    }

    // Write the remaining records back to the file
    file_put_contents($filename, implode("", $new_data));
    $message = "Record deleted successfully!";
}

// Fetch all records
function getAllGradeForgivenessRecords() {
    global $filename;
    $records = [];
    
    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (($line = fgetcsv($file)) !== false) {
            $records[] = $line;
        }
        fclose($file);
    }

    return $records;
}

// Fetch a specific record by student ID and record number
function getSpecificGradeForgivenessRecord($studentId, $recordNumber) {
    global $filename;
    $specific_record = null;

    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (($line = fgetcsv($file)) !== false) {
            if (strpos($line[0], $studentId . '_' . $recordNumber) === 0) {
                $specific_record = $line;
                break;
            }
        }
        fclose($file);
    }

    return $specific_record;
}

$records = getAllGradeForgivenessRecords();
$action = isset($_GET['action']) ? $_GET['action'] : 'view';

// Function to safely retrieve data from an array
function safeGet($array, $key) {
    return isset($array[$key]) ? $array[$key] : 'N/A';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }

        .container {
            margin-top: 50px;
        }

        .dashboard-header {
            background-color: #4A90E2;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }

        .logout-btn {
            position: absolute;
            top: 15px;
            right: 20px;
        }

        .grade-table {
            margin-top: 30px;
        }

        .btn-custom {
            background-color: #4A90E2;
            color: white;
            border-radius: 30px;
            padding: 10px 20px;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #357ABD;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="dashboard-header">
        <h2>Welcome, Admin</h2>
        <p>Manage Grade Forgiveness Records</p>
        <a href="admin_dashboard.php?logout=true" class="btn btn-danger logout-btn">Logout</a>
    </div>

    <!-- Message -->
    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?= $message; ?></div>
    <?php endif; ?>

    <!-- View All Records -->
    <div class="grade-table">
        <h4>All Grade Forgiveness Records</h4>
        <table class="table table-bordered table-hover">
            <thead class="thead-dark">
            <tr>
                <th>Record Number</th>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Module Name</th>
                <th>Initial Grade</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($records)): ?>
                <?php foreach ($records as $record): ?>
                    <tr>
                        <td><?= safeGet(explode('_', $record[0]), 1); ?></td> <!-- Record Number -->
                        <td><?= safeGet(explode('_', $record[0]), 0); ?></td> <!-- Student ID -->
                        <td><?= safeGet($record, 1); ?></td> <!-- Student Name -->
                        <td><?= safeGet($record, 11); ?></td> <!-- Module Name -->
                        <td><?= safeGet($record, 15); ?></td> <!-- Initial Grade -->
                        <td>
                            <a href="admin_dashboard.php?action=view_record&student_id=<?= safeGet(explode('_', $record[0]), 0); ?>&record_number=<?= safeGet(explode('_', $record[0]), 1); ?>" class="btn btn-info">View</a>
                            <form method="POST" action="admin_dashboard.php" style="display:inline;">
                                <input type="hidden" name="student_id" value="<?= safeGet(explode('_', $record[0]), 0); ?>">
                                <input type="hidden" name="record_number" value="<?= safeGet(explode('_', $record[0]), 1); ?>">
                                <button type="submit" name="delete_record" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No grade forgiveness records found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Option to Delete the File -->
    <form method="POST" action="admin_dashboard.php">
        <button type="submit" name="delete_file" class="btn btn-danger">Delete All Grade Forgiveness Records</button>
    </form>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
