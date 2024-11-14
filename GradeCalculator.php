<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieving form data
    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $gender = $_POST['gender'];
    $course_test = $_POST['course_test'];
    $individual_project = $_POST['individual_project'];
    $lab_test = $_POST['lab_test'];
    $group_project = $_POST['group_project'];
    $group_presentation = $_POST['group_presentation'];
    $research_presentation = $_POST['research_presentation'];
    $lab_exercise = $_POST['lab_exercise'];

    // Calculating the total grade based on weighted scores
    $total_grade = ($course_test * 0.15) +
                   ($individual_project * 0.15) +
                   ($lab_test * 0.20) +
                   ($group_project * 0.25) +
                   ($group_presentation * 0.10) +
                   ($research_presentation * 0.10) +
                   ($lab_exercise * 0.05);

    // Convert total grade to letter grade
    if ($total_grade >= 90) {
        $letter_grade = 'A';
    } elseif ($total_grade >= 80) {
        $letter_grade = 'B';
    } elseif ($total_grade >= 70) {
        $letter_grade = 'C';
    } elseif ($total_grade >= 60) {
        $letter_grade = 'D';
    } else {
        $letter_grade = 'F';
    }

    // Outputting the results
    echo "<h1>Result for $first_name (ID: $id_number)</h1>";
    echo "<p>Letter Grade: $letter_grade</p>";
    
    if ($total_grade >= 60) {
        echo "<p>Congratulations! You have passed the course.</p>";
    } else {
        echo "<p>Unfortunately, you have failed and will need to redo the course.</p>";
    }
}
?>
