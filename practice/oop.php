<?php
class Person
{

    public $name;

    protected $age;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function setAge($age)
    {
        if ($age < 21) {
            throw new Exception('You\'re way too young!');
        }
        $this->age = $age;
    }
    public function getAge($age)
    {
        return $this->age;
    }

}

$person = new Person('Yankel');
$person->setAge(52);
echo $person->age;
var_dump($person);