<?php
// SCITaddStudentsRec_validate.php
session_start();

// Initialize an array to hold error messages
$errors = [];

// Retrieve and sanitize POST data
$id = trim($_POST['id'] ?? '');
$title = trim($_POST['title'] ?? '');
$firstName = trim($_POST['firstName'] ?? '');
$lastName = trim($_POST['lastName'] ?? '');
$age = trim($_POST['age'] ?? '');

// Validate ID
if (empty($id)) {
    $errors[] = 'Student ID is required.';
}

// Validate Title
$validTitles = ['Mr', 'Ms', 'Mrs', 'Dr'];
if (!in_array($title, $validTitles)) {
    $errors[] = 'Invalid title selected.';
}

// Validate First Name
if (empty($firstName)) {
    $errors[] = 'First Name is required.';
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
    $errors[] = 'Only letters and white space allowed in First Name.';
}

// Validate Last Name
if (empty($lastName)) {
    $errors[] = 'Last Name is required.';
} elseif (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
    $errors[] = 'Only letters and white space allowed in Last Name.';
}

// Validate Age
if (empty($age)) {
    $errors[] = 'Age is required.';
} elseif (!filter_var($age, FILTER_VALIDATE_INT, ["options" => ["min_range" => 16, "max_range" => 100]])) {
    $errors[] = 'Age must be a number between 16 and 100.';
}

// Validate Photo
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    $file_name = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed)) {
        $errors[] = 'Invalid file type for photo. Allowed types: jpg, jpeg, png, gif.';
    }

    // Optional: Check file size (e.g., max 2MB)
    if ($_FILES['photo']['size'] > 2 * 1024 * 1024) {
        $errors[] = 'Photo size must be less than 2MB.';
    }
} else {
    $errors[] = 'Photo is required.';
}

if (!empty($errors)) {
    // Redirect back with errors and previously entered data
    $query = http_build_query([
        'id' => $id,
        'title' => $title,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'age' => $age,
        'error_messages' => $errors
    ]);
    header("Location: SCITaddStudentsRec.php?$query");
    exit();
} else {
    // Save the uploaded photo to a directory (e.g., uploads/)
    $upload_dir = 'uploads/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }
    $unique_name = uniqid() . '.' . $file_ext;
    move_uploaded_file($file_tmp, $upload_dir . $unique_name);

    // Store data in session to pass to the next form
    $_SESSION['student'] = [
        'id' => $id,
        'title' => $title,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'age' => $age,
        'photo' => $unique_name
    ];

    // Redirect to the next form
    header('Location: SCITaddStudentsProg.php');
    exit();
}
?>
