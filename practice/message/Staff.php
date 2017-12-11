<?php

namespace App;

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