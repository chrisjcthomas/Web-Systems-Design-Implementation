<?php
session_start();
if ($_SESSION['role'] !== 'DBA') {
    header('Location: unauthorized.php'); // Redirect to an unauthorized page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBA Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="navbar">
        <span>adWebApp DBA Dashboard</span>
        <a href="logout.php">Logout</a>
    </div>
</header>

<div class="container mt-5">
    <h1 class="text-center">Welcome to the DBA Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    <p class="text-center text-muted">Manage database, backups, and security configurations.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="list-group">
                <a href="dba_dashboard.php" class="list-group-item list-group-item-action active">
                    <i class="fas fa-home"></i> Dashboard Home
                </a>
                <a href="database_management.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-database"></i> Database Management
                </a>
                <a href="backup_management.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-cloud-upload-alt"></i> Backup Management
                </a>
                <a href="security_settings.php" class="list-group-item list-group-item-action">
                    <i class="fas fa-shield-alt"></i> Security Settings
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h5>Database Overview</h5>
                <p>Manage all database functions, including maintenance, backups, and security configurations.</p>
                <!-- Add specific DBA content here -->
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 adWebApp. All Rights Reserved.</p>
</footer>

</body>
</html>
