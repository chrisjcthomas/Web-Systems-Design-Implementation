<?php
session_start();
if ($_SESSION['role'] !== 'SecurityManager') {
    header('Location: unauthorized.php'); // Redirect to an unauthorized page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Security Manager Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="navbar">
        <span>adWebApp Security Manager Dashboard</span>
        <a href="logout.php">Logout</a>
    </div>
</header>

<div class="container mt-5">
    <h1 class="text-center">Welcome to the Security Manager Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <p class="text-center text-muted">Manage contracts, shifts, and employee data.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="list-group">
                <a href="security_manager_dashboard.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-home"></i> Dashboard Home
                </a>
                <a href="contract_management.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-file-contract"></i> Contract Management
                </a>
                <a href="shift_scheduling.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-calendar-alt"></i> Shift Scheduling
                </a>
                <a href="employee_data.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-users"></i> Employee Data
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h5>Contract and Employee Management</h5>
                <p>Manage contracts, schedule shifts, and view or update employee data.</p>
                <!-- Add specific Security Manager content here -->
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2023 MyApp. All Rights Reserved.</p>
</footer>

</body>
</html>
