<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'student') {
    die('Access denied');
}

$filename = 'grade_forgiveness.txt';
$studentId = '251017';  // Example student ID (replace with dynamic session or input)

// Function to read records from the text file
function getGradeForgivenessRecords($studentId) {
    global $filename;
    $records = [];

    if (file_exists($filename)) {
        $file = fopen($filename, 'r');
        while (($line = fgetcsv($file)) !== false) {
            // Check if the record belongs to the logged-in student
            if (strpos($line[0], $studentId) === 0) {
                $records[] = $line;
            }
        }
        fclose($file);
    }
    return $records;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: login.php');
    exit();
}

// Handle form submission for adding grade forgiveness
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_grade'])) {
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $course_of_study = $_POST['course_of_study'];
    $course_code = $_POST['course_code'];
    $major = $_POST['major'];
    $minor = $_POST['minor'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $academic_year = $_POST['academic_year'];
    $semester = $_POST['semester'];
    $campus = $_POST['campus'];
    $student_signature = $_POST['student_signature'];
    $submission_date = $_POST['submission_date']; // Capture submission date

    // Module data (these are arrays)
    $module_name = $_POST['module_name'];
    $module_code = $_POST['module_code'];
    $module_academic_year = $_POST['module_academic_year'];
    $module_academic_session = $_POST['module_academic_session'];
    $module_initial_grade = $_POST['module_initial_grade'];
    $module_decision = $_POST['module_decision'];
    $module_comment = $_POST['module_comment'];

    // Open the file for appending
    $file = fopen($filename, 'a');
    if ($file === false) {
        die('Error opening file for writing.');
    }

    // Append each module to the file
    for ($i = 0; $i < count($module_name); $i++) {
        // Create an array of data for each module entry
        $record = [
            $student_id . '_' . ($i + 1),        // Primary key (studentID_recordNumber)
            $student_name,
            $course_of_study,
            $course_code,
            $major,
            $minor,
            $email,
            $phone,
            $academic_year,
            $semester,
            $campus,
            $module_name[$i],
            $module_code[$i],
            $module_academic_year[$i],
            $module_academic_session[$i],
            $module_initial_grade[$i],
            $module_decision[$i],
            $module_comment[$i],
            $student_signature,
            $submission_date
        ];
        fputcsv($file, $record); // Write data as CSV format to the file
    }

    fclose($file); // Close the file after writing
    header('Location: student_dashboard.php'); // Redirect back to the dashboard
    exit();
}

// Fetch existing records
$records = getGradeForgivenessRecords($studentId);

// Handle deletion of grade forgiveness records
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_record'])) {
    $record_number = $_POST['record_number'];
    $entered_student_id = $_POST['student_id']; // Confirm the student ID before processing deletion

    // Ensure that the entered ID matches the logged-in student's ID
    if ($entered_student_id === $studentId) {
        // Read the current file data
        $file_data = file($filename);
        $new_data = [];
        foreach ($file_data as $line) {
            $line_data = str_getcsv($line);
            if (strpos($line_data[0], $studentId . '_' . $record_number) === false) {
                // Keep the records that don't match the record number for deletion
                $new_data[] = $line;
            }
        }
        // Write the new data back to the file
        file_put_contents($filename, implode("", $new_data));
        header('Location: student_dashboard.php'); // Redirect back after deletion
        exit();
    } else {
        echo "Incorrect student ID entered.";
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : 'view';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>

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
        <h2>Welcome, Student</h2>
        <p>Manage your Grade Forgiveness Requests</p>
        <a href="student_dashboard.php?logout=true" class="btn btn-danger logout-btn">Logout</a>
    </div>

    <?php if ($action === 'view'): ?>
        <!-- Display Grade Forgiveness Records -->
        <div class="grade-table">
            <h4>Your Grade Forgiveness Records</h4>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Record Number</th>
                    <th>Module Name</th>
                    <th>Initial Grade</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($records)): ?>
                    <?php foreach ($records as $record): ?>
                        <tr>
                            <td><?= explode('_', $record[0])[1]; ?></td> <!-- Record Number -->
                            <td><?= $record[11]; ?></td> <!-- Module Name -->
                            <td><?= $record[15]; ?></td> <!-- Initial Grade -->
                            <td>
                                <a href="student_dashboard.php?action=edit&record_number=<?= explode('_', $record[0])[1]; ?>" class="btn btn-warning">Edit</a>
                                <a href="student_dashboard.php?action=delete&record_number=<?= explode('_', $record[0])[1]; ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No grade forgiveness records found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Option to Add New Grade Forgiveness -->
        <div class="text-right">
            <a href="student_dashboard.php?action=add" class="btn btn-custom">Add New Grade Forgiveness</a>
        </div>

    <?php elseif ($action === 'add'): ?>
        <!-- Add Grade Forgiveness Form -->
        <form method="POST" action="">
            <input type="hidden" name="add_grade" value="1">
            <!-- Student Information Section -->
            <div class="form-section">
                <h4>Student Information</h4>
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="student_name">Student’s Name:</label>
                        <input type="text" class="form-control" id="student_name" name="student_name" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="student_id">ID #:</label>
                        <input type="text" class="form-control" id="student_id" name="student_id" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email Address:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="phone">Phone #:</label>
                        <input type="text" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="academic_year">Academic Year:</label>
                        <input type="text" class="form-control" id="academic_year" name="academic_year" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="semester">Semester:</label>
                        <input type="text" class="form-control" id="semester" name="semester" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="campus">Campus:</label>
                        <input type="text" class="form-control" id="campus" name="campus" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="course_of_study">Course of Study:</label>
                        <input type="text" class="form-control" id="course_of_study" name="course_of_study" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="course_code">Course Code:</label>
                        <input type="text" class="form-control" id="course_code" name="course_code" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="major">Major:</label>
                        <input type="text" class="form-control" id="major" name="major" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="minor">Minor:</label>
                        <input type="text" class="form-control" id="minor" name="minor">
                    </div>
                </div>

                <!-- Module Information Section -->
                <div class="form-section">
                    <h4>Module Information</h4>
                    <table class="table table-bordered module-table">
                        <thead class="thead-dark">
                        <tr>
                            <th>Module Name</th>
                            <th>Module Code</th>
                            <th>Academic Year</th>
                            <th>Academic Session</th>
                            <th>Initial Grade</th>
                            <th>Decision</th>
                            <th>Comment / Signature</th>
                        </tr>
                        </thead>
                        <tbody>
                        <!-- Two Rows -->
                        <tr>
                            <td><input type="text" class="form-control" name="module_name[]" required></td>
                            <td><input type="text" class="form-control" name="module_code[]" required></td>
                            <td><input type="text" class="form-control" name="module_academic_year[]" required></td>
                            <td><input type="text" class="form-control" name="module_academic_session[]" required></td>
                            <td><input type="text" class="form-control" name="module_initial_grade[]" required></td>
                            <td><input type="text" class="form-control" name="module_decision[]"></td>
                            <td><input type="text" class="form-control" name="module_comment[]"></td>
                        </tr>
                        <tr>
                            <td><input type="text" class="form-control" name="module_name[]" required></td>
                            <td><input type="text" class="form-control" name="module_code[]" required></td>
                            <td><input type="text" class="form-control" name="module_academic_year[]" required></td>
                            <td><input type="text" class="form-control" name="module_academic_session[]" required></td>
                            <td><input type="text" class="form-control" name="module_initial_grade[]" required></td>
                            <td><input type="text" class="form-control" name="module_decision[]"></td>
                            <td><input type="text" class="form-control" name="module_comment[]"></td>
                        </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Student Signature Section -->
                <div class="form-group">
                    <label for="student_signature">Student’s Name & Signature:</label>
                    <input type="text" class="form-control" id="student_signature" name="student_signature" required>
                </div>
                <div class="form-group">
                    <label for="submission_date">Date:</label>
                    <input type="date" class="form-control" id="submission_date" name="submission_date" required>
                </div>

                <!-- Additional signature rows for advisor, director, etc. -->
                <div class="form-group">
                    <label for="advisor_signature">Advisor’s Name & Signature:</label>
                    <input type="text" class="form-control" id="advisor_signature" name="advisor_signature">
                    <label for="advisor_date">Date:</label>
                    <input type="date" class="form-control" id="advisor_date" name="advisor_date">
                </div>
                <div class="form-group">
                    <label for="director_signature">Programme Director/HoD’s Name & Signature:</label>
                    <input type="text" class="form-control" id="director_signature" name="director_signature">
                    <label for="director_date">Date:</label>
                    <input type="date" class="form-control" id="director_date" name="director_date">
                </div>
                <div class="form-group">
                    <label for="admin_signature">Processed by (College/Faculty Administrator):</label>
                    <input type="text" class="form-control" id="admin_signature" name="admin_signature">
                    <label for="admin_date">Date:</label>
                    <input type="date" class="form-control" id="admin_date" name="admin_date">
                </div>

                <button type="submit" class="btn btn-custom">Submit Grade Forgiveness</button>
                <a href="student_dashboard.php" class="btn btn-secondary">Cancel</a>
            </div>
        </form>

    <?php elseif ($action === 'delete'): ?>
        <!-- Delete Confirmation -->
        <form method="POST" action="student_dashboard.php">
            <input type="hidden" name="delete_record" value="1">
            <input type="hidden" name="record_number" value="<?= $_GET['record_number']; ?>">
            <div class="form-group">
                <label for="student_id">Please confirm your Student ID to delete this record:</label>
                <input type="text" class="form-control" id="student_id" name="student_id" required>
            </div>
            <button type="submit" class="btn btn-danger">Confirm Delete</button>
            <a href="student_dashboard.php" class="btn btn-secondary">Cancel</a>
        </form>

    <?php endif; ?>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
