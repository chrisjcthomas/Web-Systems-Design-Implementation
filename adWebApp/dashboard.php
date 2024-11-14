<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DBA Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<header>
    <div class="navbar">
        <span>MyApp Dashboard</span>
        <a href="logout.php">Logout</a>
    </div>
</header>

<div class="container mt-5">
    <h1 class="text-center">Welcome to the DBA Dashboard, AdminUser!</h1>
    <p class="text-center text-muted">Here you have access to full database control, backups, and security configuration.</p>
    
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">Dashboard Home</a>
                <a href="#" class="list-group-item list-group-item-action">Database Management</a>
                <a href="#" class="list-group-item list-group-item-action">User Management</a>
                <a href="#" class="list-group-item list-group-item-action">Reports</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow-sm p-4">
                <h5>Database Management</h5>
                <p>Here, you can manage all aspects of the database. Use the links in the sidebar to navigate to various sections.</p>
                <!-- Add any dashboard-specific content here -->
            </div>
        </div>
    </div>
</div>

<footer>
    <p>&copy; 2024 adWebApp. All Rights Reserved.</p>
</footer>

</body>
</html>
