<?php

namespace App;

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
