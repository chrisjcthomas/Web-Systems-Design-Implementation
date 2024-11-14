
<!DOCTYPE html>
<html>
<head>
    <title>Registered Users</title>
    <link rel="stylesheet" type="text/css" href="azq_style.css">
</head>
<body>
    <h1>List of Registered Users</h1>
    
    <?php
    // For demonstration, an array of users is shown
    // Replace this with your database query logic to fetch actual users
    $users = [
        ["John Doe", "johndoe@example.com", "Male", "Single"],
        ["Jane Smith", "janesmith@example.com", "Female", "Married"]
    ];

    if (count($users) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Email</th><th>Gender</th><th>Marital Status</th></tr>";
        
        foreach ($users as $user) {
            echo "<tr>";
            foreach ($user as $detail) {
                echo "<td>" . htmlspecialchars($detail) . "</td>";
            }
            echo "</tr>";
        }
        
        echo "</table>";
    } else {
        echo "<p>No registered users found.</p>";
    }
    ?>

</body>
</html>
