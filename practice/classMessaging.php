<?php
class Person
{

    protected $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

class Business
{
    protected $staff;

    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }
    public function hire(Person $person){
        $this->staff->add($person);
    }
    public function getMembers(){
        return $this->staff->getMembers();
    }
}

class Staff
{
    public $members = [];

    public function add(Person $person)
    {
        $this->members[] = $person;
    }
    public function getMembers(){
        return $this->members;
    }
}

$rdabbah = new Person('R Dabbah');
$staff = new Staff;
$allways = new Business($staff);
$allways->hire($rdabbah);
var_dump($rdabbah);
var_dump($staff);
var_dump($allways);
