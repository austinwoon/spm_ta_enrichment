<?php
include_once("Person.php");

$person1 = new Person("Rick", 70, "Grey");
$person2 = new Person("Morty", 16, "Brown");

echo "<b>Rick's Greeting: </b>" . $person1->say_hello() . "<br>";
echo "<b>Morty's Greeting: </b>" . $person2->say_hello();

