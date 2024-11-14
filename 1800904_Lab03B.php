<?php
// Create an associative array with initials as keys and salaries as values
$salaries = [
    'ABC' => 45000.00,
    'LIL' => 5600.00,
    'BBC' => 78000.00,
    'LBJ' => 32000.00,
    'MNM' => 55000.00
];

// Function to display the array in a table
function displaySalaries($salaries) {
    echo "<table border='1'>";
    echo "<tr><th>Initials</th><th>Salary</th></tr>";
    foreach ($salaries as $initial => $salary) {
        echo "<tr><td>{$initial}</td><td>{$salary}</td></tr>";
    }
    echo "</table><br>";
}

// Display all name and salary pairs with the salaries in ascending order
asort($salaries); // Sort by salary in ascending order
echo "<h3>Salaries in Ascending Order:</h3>";
displaySalaries($salaries);

// Display all name and salary pairs with the names in descending order
krsort($salaries); // Sort by key (initials) in descending order
echo "<h3>Names in Descending Order:</h3>";
displaySalaries($salaries);

?>
