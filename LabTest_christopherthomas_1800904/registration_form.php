<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f9;
            overflow-y: auto; /* Ensure the form doesn't disappear */
        }
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 500px; /* Form width */
            max-width: 100%; /* Make sure form adapts on small screens */
            box-sizing: border-box; /* Fix padding issues */
        }
        .form-container h2 {
            text-align: center;
        }
        .form-container p {
            font-size: 14px;
            text-align: center;
            margin-bottom: 15px;
        }
        .form-container hr {
            margin: 20px 0;
        }
        .form-container input, .form-container select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box; /* Fix padding issues */
        }
        .form-container label {
            font-size: 16px;
            margin-bottom: 10px;
            display: block;
        }
        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-container button:hover {
            background-color: #45a049;
        }
        .form-container .section-title {
            font-size: 18px;
            margin-top: 15px;
        }
        .form-container .sub-title {
            font-size: 16px;
            font-weight: bold;
        }
        .form-container .degree-options {
            display: flex;
            flex-direction: column;
        }
        .degree-options label {
            display: flex;
            align-items: center;
        }
        .degree-options input {
            margin-right: 10px; /* Align radio button with text */
        }
        .error {
            color: red;
            text-align: center;
        }
        .success {
            color: green;
            text-align: center;
        }
        .welcome-message {
            text-align: center;
            font-size: 16px;
            color: #4CAF50;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="form-container">
    <?php
        session_start();
        $username = ''; // Assuming username is saved in the session after login
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            echo "<p class='welcome-message'>Welcome $username to the Environmental Club</p>";
        }
    ?>
    
    <h2>Environmental Club Member Registration Form</h2>
    <p>Please fill out all applicable information to register for membership. Students MUST be enrolled in a Degree Program at the University of Technology, Jamaica within the school of Computing and Information Technology.</p>
    <hr>

    <h3 class="section-title">DEMOGRAPHICS</h3> 

    <?php
        $error_message = '';
        $success_message = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_number = $_POST['id_number'];
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $gender = $_POST['gender'];
            $academic_year = $_POST['academic_year'];
            $cell_phone = $_POST['cell_phone'];
            $email = $_POST['email'];
            $degree = $_POST['degree'];

            // Validate inputs
            if (empty($id_number) || empty($first_name) || empty($last_name) || empty($cell_phone) || empty($email)) {
                $error_message = 'All fields are required!';
            } else {
                // Append data to demographics.txt
                $demographics_file = fopen("demographics.txt", "a");
                fwrite($demographics_file, "$id_number, $first_name, $last_name, $gender, $academic_year\n");
                fclose($demographics_file);

                // Append data to contact.txt
                $contact_file = fopen("contact.txt", "a");
                fwrite($contact_file, "$id_number, $cell_phone, $email\n");
                fclose($contact_file);

                // Append data to study.txt
                $study_file = fopen("study.txt", "a");
                fwrite($study_file, "$id_number, $degree\n");
                fclose($study_file);

                $success_message = 'Registration successful!';
            }
        }
    ?>

    <form method="post" action="">
        <input type="text" name="id_number" placeholder="ID Number" required>
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <select name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
        <input type="text" name="academic_year" placeholder="Academic Year" required>
		<hr>
		
		<h3 class="section-title">CONTACT INFO</h3>
        <input type="text" name="cell_phone" placeholder="Cell Phone" required>
        <input type="email" name="email" placeholder="Email" required>
		<hr>

        <h3 class="section-title">COURSE OF STUDY</h3>
        <label for="degree" class="sub-title">Degree of Pursuit</label>
        <div class="degree-options">
            <label><input type="radio" name="degree" value="Associate Degree in Computer Studies" required> Associate Degree in Computer Studies</label>
            <label><input type="radio" name="degree" value="BSc in Computing and Information Technology" required> BSc in Computing and Information Technology</label>
            <label><input type="radio" name="degree" value="BSc in Animation Production and Development" required> BSc in Animation Production and Development</label>
        </div>
        <button type="submit">Submit</button>
    </form>

    <?php if ($error_message): ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php elseif ($success_message): ?>
        <p class="success"><?php echo $success_message; ?></p>
    <?php endif; ?>
</div>

</body>
</html>
