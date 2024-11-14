<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Summary Report</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .report-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            text-align: left;
        }
        .report-box h2 {
            text-align: center;
        }
        .report-box p {
            font-size: 16px;
            line-height: 1.6;
            margin: 5px 0;
        }
        .report-box strong {
            color: #333;
        }
    </style>
</head>
<body>
    <div class="report-box">
        <h2>Summary Report</h2>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($_SESSION["fullname"]); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION["email"]); ?></p>
        <p><strong>Contact:</strong> <?php echo htmlspecialchars($_SESSION["contact"]); ?></p>
        <p><strong>Religion:</strong> <?php echo htmlspecialchars($_SESSION["religion"]); ?></p>
        <p><strong>Nationality:</strong> <?php echo htmlspecialchars($_SESSION["nationality"]); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars(ucfirst($_SESSION["gender"])); ?></p>
        <p><strong>Educational Qualification:</strong> <?php echo htmlspecialchars($_SESSION["education"]); ?></p>
        <p><strong>Job Experience:</strong> <?php echo htmlspecialchars($_SESSION["experience"]); ?></p>
        <p><strong>Address 1:</strong> <?php echo htmlspecialchars($_SESSION["address1"]); ?></p>
        <p><strong>Address 2:</strong> <?php echo htmlspecialchars($_SESSION["address2"]); ?></p>
        <p><strong>City:</strong> <?php echo htmlspecialchars($_SESSION["city"]); ?></p>
        <p><strong>Pin Code:</strong> <?php echo htmlspecialchars($_SESSION["pincode"]); ?></p>
        <p><strong>State:</strong> <?php echo htmlspecialchars($_SESSION["state"]); ?></p>
    </div>
</body>
</html>
