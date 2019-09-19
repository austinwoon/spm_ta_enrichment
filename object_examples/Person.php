<?php
class Person {
    public $name;
    public $age;
    public $hair_colour;

    function __construct($name, $age, $hair_colour)
    {
        $this->name = $name;
        $this->age = $age;
        $this->hair_colour = $hair_colour;
    }

    function say_hello() {
        if ($this->name == "Rick") {
            return "Wubba Lubba Dub Dub!";
        } else if ($this->name == "Morty") {
            return "Oh man, oh geez!";
        } else {
            # if not rick or morty
            return "Hello!";
        }
    }
    
}
?>