
<!--
Labs are to be completed in groups of two (2).

Create a PHP Script that prints out the names of students in class (below) in an unordered list, using arrays.
Count and Display the number of students in the array.
Sort the names alphabetically and then print them in an ordered list.
Sort the names in the reverse, and print them out in another ordered list.

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footballers List</title>
</head>
<body>

<?php
// Step 1: Define an array of footballer names
$footballers = ["Lionel Messi", "Cristiano Ronaldo", "Neymar Jr", "Kylian Mbappe", "Kevin De Bruyne", "Luka Modric", "Robert Lewandowski", "Virgil van Dijk"];

// Step 2: Print out the names of footballers in an unordered list
echo "<h2>Unordered List of Footballers</h2>";
echo "<ul>";
foreach ($footballers as $player) {
    echo "<li>$player</li>";
}
echo "</ul>";

// Step 3: Count and display the number of footballers in the array
$footballerCount = count($footballers);
echo "<p>Number of footballers in the list: $footballerCount</p>";

// Step 4: Sort the names alphabetically and print them in an ordered list
sort($footballers); // Sorts the array in ascending order
echo "<h2>Ordered List of Footballers (Alphabetical)</h2>";
echo "<ol>";
foreach ($footballers as $player) {
    echo "<li>$player</li>";
}
echo "</ol>";

// Step 5: Sort the names in reverse alphabetical order and print them in another ordered list
rsort($footballers); // Sorts the array in descending order
echo "<h2>Ordered List of Footballers (Descending)</h2>";
echo "<ol>";
foreach ($footballers as $player) {
    echo "<li>$player</li>";
}
echo "</ol>";
?>

</body>
</html>

