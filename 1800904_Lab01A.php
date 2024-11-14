<!--
	NAME: ChristopherThomas 
	ID#: 1800904
	MODULE CODE: CIT4034
	DAY/TIME OF CLASS: WED @11 - 2


	Question:
Write a PHP script that uses string functions to manipulate the list below the questions.  

* Place the strings in an array.
* Check the length of the array of words (words provided below)
* Display the original string.
* Display the string in ascending or descending order.
* Display the appropriate information based on the criteria below:-
	* If the word length is too small (less than 6) then rate the word as EASY
	* If the word length is moderate (between 6 and 9) then rate the word as MODERATE
	* If the word length is long(greater than 9) then rate the word as HARD

Use the color code below to set the color of a word based on the rating:

* EASY words: green
* MODERATE words: yellow
* HARD words: red

List of Words: 

cloth, freckle, circulate, or, interference, magnetic, merit, far, director, shallow, ordinary, pension, last, 
maverick, victory, jacket, mutation. lab, balanced, update, office, wave, box, cat, river, at, vehicle, master, mountain, ocean	
-->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Word Classification and Styling</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        h1 {
            color: #333;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 800px;
            margin: auto;
        }
        .section {
            margin-bottom: 20px;
        }
        .word {
            font-weight: bold;
            padding: 4px 8px;
            border-radius: 4px;
            display: inline-block;
            margin: 2px;
        }
        .easy {
            color: #155724;
            background-color: #d4edda;
        }
        .moderate {
            color: #856404;
            background-color: #fff3cd;
        }
        .hard {
            color: #721c24;
            background-color: #f8d7da;
        }
    </style>
</head>
<body>
    <div class="container">
		<center>
        <h1>Word Classification and Rating</h1>
		</center>

        <?php
        // List of words
        $words = [
            "cloth", "freckle", "circulate", "or", "interference", "magnetic", "merit", "far", 
            "director", "shallow", "ordinary", "pension", "last", "maverick", "victory", 
            "jacket", "mutation", "lab", "balanced", "update", "office", "wave", "box", 
            "cat", "river", "at", "vehicle", "master", "mountain", "ocean"
        ];

        // Function to display words with colors
        function colorizeWord($word, $rating) {
            $class = strtolower($rating); // CSS class name based on rating
            return "<span class='word $class'>$word ($rating)</span>";
        }

        // Check the length of the array of words
        $wordCount = count($words);
        echo "<div class='section'><strong>Total Number of Words:</strong> $wordCount</div>";

        // Display the original array of words
        echo "<div class='section'><strong>Original Words List:</strong><br>";
        echo implode(", ", $words) . "</div>";

        // Display the words in ascending order
        $ascendingWords = $words;
        sort($ascendingWords);
        echo "<div class='section'><strong>Words in Ascending Order:</strong><br>";
        echo implode(", ", $ascendingWords) . "</div>";

        // Display the words in descending order
        $descendingWords = $words;
        rsort($descendingWords);
        echo "<div class='section'><strong>Words in Descending Order:</strong><br>";
        echo implode(", ", $descendingWords) . "</div>";

        // Classify and display words based on their length and apply color coding
        echo "<div class='section'><strong>Word Classification and Color Coding:</strong><br>";

        foreach ($words as $word) {
            $length = strlen($word);

            // Determine the rating of the word based on its length
            if ($length < 6) {
                $rating = "EASY";
            } elseif ($length >= 6 && $length <= 9) {
                $rating = "MODERATE";
            } else {
                $rating = "HARD";
            }

            // Display the word with its corresponding color
            echo colorizeWord($word, $rating) . "<br>";
        }

        echo "</div>";
        ?>

    </div>
</body>
</html>
