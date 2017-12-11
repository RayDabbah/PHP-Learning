<?php
interface Fruit
{
    public function __construct($weight);
}

class Apples implements Fruit
{

    public $weight;

    public function __construct($weight){
        $this->weight =  $weight;
    }

    public function color($color){
        return $color;
    }
}

$apples = new Apples('2 lb.');
$apples->color = 'red';

var_dump($apples);
