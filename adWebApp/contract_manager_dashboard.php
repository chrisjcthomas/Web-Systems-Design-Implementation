<?php
session_start();
if ($_SESSION['role'] !== 'ContractManager') {
    header('Location: unauthorized.php'); // Redirect to an unauthorized page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract Manager Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="navbar">
        <span>adWebApp Contract Manager Dashboard</span>
        <a href="logout.php">Logout</a>
    </div>
</header>

<div class="container mt-5">
    <h1 class="text-center">Welcome to the Contract Manager Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <p class="text-center text-muted">Manage contracts and clients.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="list-group">
                <a href="contract_manager_dashboard.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-home"></i> Dashboard Home
                </a>
                <a href="client_management.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-user-tie"></i> Client Management
                </a>
                <a href="contract_management.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-file-contract"></i> Contract Management
                </a>
                <a href="reports.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-chart-line"></i> Reports
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h5>Client and Contract Management</h5>
                <p>Manage client relationships, update contracts, and view reports.</p>
                <!-- Add specific Contract Manager content here -->
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2023 MyApp. All Rights Reserved.</p>
</footer>

</body>
</html>
