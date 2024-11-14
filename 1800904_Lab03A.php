<?php
// Combine two arrays of popular video games and convert to uppercase
$array1 = ["The Legend of Zelda", "Super Mario Odyssey", "Minecraft", "Fortnite", "Call of Duty"];
$array2 = ["Overwatch", "Grand Theft Auto V", "Red Dead Redemption 2", "Apex Legends", "League of Legends"];

// Merge arrays and convert elements to uppercase
$combined_array = array_map('strtoupper', array_merge($array1, $array2));

// Display the combined array in a table
echo "<table border='1'>";
echo "<tr><th>Popular Video Games</th></tr>";
foreach ($combined_array as $game) {
    echo "<tr><td>{$game}</td></tr>";
}
echo "</table>";

// Sentence to analyze
$sentence = "The Legend of Zelda is one of the most influential games, while games like Apex Legends are popular among battle royale fans.";

// Split sentence into words and count words that contain 'a'
$words = explode(' ', $sentence);
$count = 0;

foreach ($words as $word) {
    if (stripos($word, 'a') !== false) {
        $count++;
    }
}

// Display the count of words containing 'a'
echo "<p>Total words with 'a': {$count}</p>";
?>

