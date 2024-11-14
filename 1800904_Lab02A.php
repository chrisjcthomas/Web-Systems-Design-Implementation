<!DOCTYPE html>
<html>
<head>
    <title>Wage Calculator</title>
</head>
<body>
    <h1>Wage Calculator</h1>
    <p>Calculate the weekly wage of a worker</p>
	<hr>
	<br>
	
    <!-- The form using GET method to send data to the same page -->
    <form method="GET" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br><br>

        <label for="days_worked">Days Worked (Cannot be more than 6):</label>
        <input type="number" name="days_worked" max="6" required><br><br>

        <label for="hours_per_day">Hours/Day:</label>
        <input type="number" name="hours_per_day" required><br><br>

        <label for="rate_per_hour">Rate/Hour:</label>
        <input type="number" name="rate_per_hour" required><br><br>

        <label for="lunch_weekly">Lunch (weekly reimbursement):</label>
        <input type="number" name="lunch_weekly" required><br><br>

        <input type="submit" value="Submit">
    </form>
	<hr>

    <?php
    // Check if GET data is available (i.e., the form was submitted)
    if (isset($_GET['name']) && isset($_GET['days_worked']) && isset($_GET['hours_per_day']) && isset($_GET['rate_per_hour']) && isset($_GET['lunch_weekly'])) {
        // Get form data from the GET request
        $name = $_GET['name'];
        $daysWorked = $_GET['days_worked'];
        $hoursPerDay = $_GET['hours_per_day'];
        $ratePerHour = $_GET['rate_per_hour'];
        $lunchWeekly = $_GET['lunch_weekly'];

        // Validate that days worked is 6 or less
        if ($daysWorked > 6) {
            echo "<h2>Error: You cannot work more than 6 days in a week. Please enter a valid number of days.</h2>";
        } else {
            // Calculate the weekly wage before and after lunch reimbursement
            $totalWage = $daysWorked * $hoursPerDay * $ratePerHour;
            $finalWage = $totalWage + $lunchWeekly; // Lunch is added as a reimbursement

            // Display the results
            echo "<h2>Wage Calculation for: $name</h2>";
            echo "<p>Total Wage (before reimbursement): $$totalWage</p>";
            echo "<p>Lunch Reimbursement (weekly): $$lunchWeekly</p>";
            echo "<p><strong>Final Wage (after reimbursement): $$finalWage</strong></p>";
        }
    }
    ?>
</body>
</html>

