<!--
	NAME: ChristopherThomas 
	ID#: 1800904
	MODULE CODE: CIT4034
	DAY/TIME OF CLASS: WED @11 - 2


	Question:
Create the following PHP form that takes the grades of the coursework for Web Systems Design and Implementation and calculates the percentage of the Coursework.
If the student gets a 60%, indicate that they have passed the course. Otherwise, tell them that they have failed and have to redo the course.
Submit the code as double scripting with post method.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web System Design and Implementation</title>
</head>
<body>
    <h1>Web System Design and Implementation</h1>
    <p>Calculate the course grade based on the weight of coursework.</p>
    <form action="gradecalculator.php" method="post">
        <label>ID Number:</label><br>
        <input type="text" name="id_number"><br><br>

        <label>First Name:</label><br>
        <input type="text" name="first_name"><br><br>

        <label>Gender:</label><br>
        <input type="radio" name="gender" value="Male"> Male
        <input type="radio" name="gender" value="Female"> Female<br><br>

        <label>Course Test 15%:</label><br>
        <input type="number" name="course_test"><br><br>

        <label>Individual Project 15%:</label><br>
        <input type="number" name="individual_project"><br><br>

        <label>Lab Test 20%:</label><br>
        <input type="number" name="lab_test"><br><br>

        <label>Group Project 25%:</label><br>
        <input type="number" name="group_project"><br><br>

        <label>Group Project Presentation 10%:</label><br>
        <input type="number" name="group_presentation"><br><br>

        <label>Research Presentation 10%:</label><br>
        <input type="number" name="research_presentation"><br><br>

        <label>Lab Exercise 5%:</label><br>
        <input type="number" name="lab_exercise"><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
