<!-- process.php -->
<?php
// Start output buffering to prevent headers already sent errors
ob_start();

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $color = "";
    $age = 0;
    $gender = "";

    // Check if 'color' field exists and is not empty
    if (isset($_POST['color']) && !empty(trim($_POST['color']))) {
        $color_input = trim($_POST['color']);
        // Validate hexadecimal color format using regex
        if (preg_match('/^#([A-Fa-f0-9]{6})$/', $color_input)) {
            $color = $color_input;
        } else {
            // Default color if invalid input
            $color = "#FFFFFF";
            $color_error = "Invalid color format. Using default color (#FFFFFF).";
        }
    } else {
        // Default color if not set
        $color = "#FFFFFF";
        $color_error = "Color not set. Using default color (#FFFFFF).";
    }

    // Check if 'age' field exists and is a positive integer
    if (isset($_POST['age']) && is_numeric($_POST['age']) && $_POST['age'] >= 0) {
        $age = intval($_POST['age']);
    } else {
        // Default age if invalid input
        $age = 0;
        $age_error = "Invalid age input. Setting age to 0.";
    }

    // Check if 'gender' field exists and is either 'male' or 'female'
    if (isset($_POST['gender']) && in_array(strtolower($_POST['gender']), ['male', 'female'])) {
        $gender = strtolower($_POST['gender']);
    } else {
        // Default gender if not set or invalid
        $gender = "male";
        $gender_error = "Gender not set or invalid. Using default gender (Male).";
    }

    // Calculate the year of birth
    $current_year = date("Y");
    $year_of_birth = $current_year - $age;

    // Determine the number of stars (assuming the user was born in $year_of_birth)
    // We'll calculate the number of stars as the number of years since the year of birth
    $stars_count = $current_year - $year_of_birth;

    // Limit the number of stars to prevent excessive output
    if ($stars_count > 100) {
        $stars_count = 100;
    }

    // Determine the image based on gender
    if ($gender === "male") {
        $gender_image = "images/male.png";
        $gender_alt = "Male Image";
    } else {
        $gender_image = "images/female.png";
        $gender_alt = "Female Image";
    }
} else {
    // If the form was not submitted via POST, redirect back to the form
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Personalized Page</title>
    <style>
        /* Styling for the personalized page */
        body {
            font-family: Arial, sans-serif;
            background-color: <?php echo htmlspecialchars($color); ?>;
            color: #333333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 40px;
            text-align: center;
        }
        .stars {
            font-size: 24px;
            margin: 20px 0;
            color: #FFD700; /* Gold color for stars */
        }
        .gender-image img {
            width: 150px;
            height: auto;
        }
        .errors {
            background-color: #f8d7da;
            color: #721c24;
            border-left: 6px solid #f5c6cb;
            padding: 10px;
            margin-bottom: 20px;
            display: inline-block;
            text-align: left;
        }
        .errors p {
            margin: 5px 0;
        }
        .back-link {
            margin-top: 30px;
            display: inline-block;
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            border: 1px solid #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .back-link:hover {
            background-color: #007BFF;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Display Errors if Any -->
        <?php
        if (isset($color_error) || isset($age_error) || isset($gender_error)) {
            echo '<div class="errors">';
            if (isset($color_error)) {
                echo '<p>' . htmlspecialchars($color_error) . '</p>';
            }
            if (isset($age_error)) {
                echo '<p>' . htmlspecialchars($age_error) . '</p>';
            }
            if (isset($gender_error)) {
                echo '<p>' . htmlspecialchars($gender_error) . '</p>';
            }
            echo '</div>';
        }
        ?>

        <!-- Personalized Greeting -->
        <h1>Welcome to Your Personalized Page!</h1>
        <p>Your favorite color is <strong><?php echo htmlspecialchars($color); ?></strong>.</p>
        <p>Your year of birth is <strong><?php echo htmlspecialchars($year_of_birth); ?></strong>.</p>

        <!-- Display Stars -->
        <div class="stars">
            <?php
            // Display stars based on stars_count
            for ($i = 0; $i < $stars_count; $i++) {
                echo "★ ";
            }
            ?>
        </div>

        <!-- Display Gender Image -->
        <div class="gender-image">
            <img src="<?php echo htmlspecialchars($gender_image); ?>" alt="<?php echo htmlspecialchars($gender_alt); ?>">
        </div>

        <!-- Back to Form Link -->
        <a href="1800904_WebApp.html" class="back-link">Go Back</a>
    </div>
</body>
</html>
<?php
// Flush the output buffer
ob_end_flush();
?>
