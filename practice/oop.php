<?php
abstract class Creature
{
    protected $age;
    protected $feet;

    public function __construct($feet = 4)
    {

        $this->feet = $feet;
        
    }
    public function getFeet()
    {
        return $this->feet;
    }
    abstract public function getAge();
}


class Person extends Creature
{

    public $name;


    // public function __construct($name, $feet)
    // {
    //     $this->name = $name;
    //     $this->feet = $feet;
    // }
    public function setAge($age)
    {
        if ($age < 21) {
            throw new Exception('You\'re way too young!');
        }
        $this->age = $age;
    }
    public function getAge()
    {
        return $this->age;
    }
    
}
class Cat extends Creature
{
    public function getAge(){
        return $this->age;
    }
}

$person = new Person();
$person->setAge(105);
// $person->setFeet(2);
echo $person->getFeet() . "\n";
echo $person->getAge() . "\n";

var_dump($person);

echo (new Cat())->getFeet() . "\n";


