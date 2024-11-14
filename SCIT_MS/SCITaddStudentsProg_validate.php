<?php
// SCITaddStudentsProg_validate.php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: SCITlogin.php');
    exit();
}

// Initialize an array to hold error messages
$errors = [];

// Retrieve and sanitize POST data
$id = trim($_POST['id'] ?? '');
$programme = trim($_POST['programme'] ?? '');
$major = trim($_POST['major'] ?? '');
$modules = trim($_POST['modules'] ?? '');

// Validate Student ID (ensure it matches the session)
if (empty($id)) {
    $errors[] = 'Student ID is missing.';
} elseif ($id !== $_SESSION['student']['id']) {
    $errors[] = 'Student ID mismatch.';
}

// Validate Programme
$validProgrammes = ['CIS', 'CNS', 'Animation', 'Gaming', 'Computing'];
if (!in_array($programme, $validProgrammes)) {
    $errors[] = 'Invalid programme selected.';
}

// Validate Major
if (empty($major)) {
    $errors[] = 'Major is required.';
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $major)) {
    $errors[] = 'Only letters and white space allowed in Major.';
}

// Validate Number of Modules
if (empty($modules)) {
    $errors[] = 'Number of Modules is required.';
} elseif (!filter_var($modules, FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]])) {
    $errors[] = 'Number of Modules must be a positive integer.';
}

if (!empty($errors)) {
    // Redirect back with errors and previously entered data
    $query = http_build_query([
        'programme' => $programme,
        'major' => $major,
        'modules' => $modules,
        'error_messages' => $errors
    ]);
    header("Location: SCITaddStudentsProg.php?$query");
    exit();
} else {
    // Update session data with programme information
    $_SESSION['student']['programme'] = $programme;
    $_SESSION['student']['major'] = $major;
    $_SESSION['student']['modules'] = $modules;

    // Redirect to display page with success message
    header('Location: SCITdisplay.php?success=1');
    exit();
}
?>
