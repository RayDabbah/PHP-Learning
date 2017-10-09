<?php
class Learn
{

    public $property1 = 'I am the 1st property variable';

    public function __construct()
    {
        echo __CLASS__ . ' was called!';
    }

    public function __destruct()
    {
        echo __CLASS__ . ' was destroyed!';
    }

    public function setProperty($property1)
    {
        $this->property1 = $property1;
    }
    public function getProperty()
    {
        return $this->property1;
    }
    public function __toString(){
        echo 'Testing the "magic" __toString method.' . "\n\r";
        return $this->getProperty();
    }
}

class ExtraLearning extends Learn {
    public function __construct(){
        echo 'This is from  ' . __CLASS__;
    }
    public function extraMethod(){
        parent::__construct();
        echo 'This is a method from '. __CLASS__ . '.';
    }
}
$learning = new Learn;
$learning2 = new Learn;
$learning3 = new ExtraLearning;
$learning3->extraMethod();
echo "\n\r";
// unset($learning);
echo $learning->getProperty();
echo "\n\r";
 $learning->setProperty('This is the new property');
echo "\n\r";
echo $learning->getProperty();
echo $learning2->getProperty();
echo "\n\r";
 $learning2->setProperty('This is the 2nd new property');
echo "\n\r";
echo $learning2->getProperty();
echo "\n\r";
echo $learning;
?>