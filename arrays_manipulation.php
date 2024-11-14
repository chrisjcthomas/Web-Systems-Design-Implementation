

<?php

// One way to create an associative array
$name_one = array("Zack"=>"Zara", "Anthony"=>"Any",
                  "Ram"=>"Rani", "Salim"=>"Sara",
                  "Raghav"=>"Ravina");
 
// Second way to create an associative array
$name_two["zack"] = "zara";
$name_two["anthony"] = "any";
$name_two["ram"] = "rani";
$name_two["salim"] = "sara";
$name_two["raghav"] = "ravina";
 
// Accessing the elements directly
echo "Accessing the elements directly:<br>";
echo $name_two["zack"], "<br>";
echo $name_two["salim"], "<br>";
echo $name_two["anthony"], "<br>";
echo $name_one["Ram"], "<br>";
echo $name_one["Raghav"], "<br><br><br><br> <br><br>";

//print contents of an array
print_r($name_one);
echo "<br><br>";

//place an element at the end of an array
array_push($name_one, "shaula");
print_r($name_one);
echo "<br><br>";

//remove the last element from an array
$temp = array_pop($name_one);
echo "Element removed from the array stack ".$temp;
echo "<br><br>";
print_r($name_one);


?>



<?php
 
// Creating an indexed array
$name_one = array("Zack", "Anthony", "Ram", "Salim", "Raghav");
 
// One way of Looping through an array using foreach
echo "Looping using foreach: <br>";
foreach ($name_one as $val){
    echo $val. "<br>";
}
 
// count() function is used to count
// the number of elements in an array
$round = count($name_one);
echo "<br>The number of elements are $round <br>";
 
// Another way to loop through the array using for
echo "Looping using for: <br>";
for($n = 0; $n < $round; $n++){
    echo $name_one[$n], "<br>";
}
 
?>



<?php
// Creating an associative array
$name_one = array("Zack"=>"Zara", "Anthony"=>"Any",
                    "Ram"=>"Rani", "Salim"=>"Sara",
                    "Raghav"=>"Ravina");
 
// Looping through an array using foreach
echo "Looping using foreach: <br>";
foreach ($name_one as $val => $val_value){
    echo "Husband is ".$val." and Wife is ".$val_value."<br>";
}
 
// Looping through an array using for
echo "<br>Looping using for: <br>";
$keys = array_keys($name_one);
$round = count($name_one);
 
for($i=0; $i < $round; ++$i) {
    echo $keys[$i] . ' ' . $name_one[$keys[$i]] . "<br>";
}

?>



<?php

//Traversing Multidimensional array
$array2D = array(
    array(7, 8, 9),
    array(4, 5, 6),
    array(1, 2, 3)
);
 
foreach ($array2D as $array1D) {
    foreach ($array1D as $element) {
        echo $element;
        echo " ";
    }
    echo "<br>";
}
?>


<?php
//Defining a multidimensional array
//Accessing Elements

$array2D = array(
    array(7, 8, 9),
    array(4, 5, 6),
    array(1, 2, 3)
);
 
$value = $array2D[1][2];
echo "The value in position array2D[1][2] " . $value. "<br><br>";



foreach ($array2D as $array1D) {
    foreach ($array1D as $element) {
        echo $element, "<br><br>";
        echo " ";
    }
    echo "<br>";
}

?>




<?php
// Defining a multidimensional array associative array
$favorites = array(
    "Dave Punk" => array(
        "mob" => "5689741523",
        "email" => "davepunk@gmail.com",
    ),
    "Dave Punk" => array(
        "mob" => "2584369721",
        "email" => "montysmith@gmail.com",
    ),
    "John Flinch" => array(
        "mob" => "9875147536",
        "email" => "johnflinch@gmail.com",
    )
);
 
// Using for and foreach in nested form
$keys = array_keys($favorites);
for($i = 0; $i < count($favorites); $i++) {
    echo $keys[$i] . "<br>";
    foreach($favorites[$keys[$i]] as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }
    echo "<br>";
}

?>