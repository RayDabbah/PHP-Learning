<?php
class Learn
{

    public $property1 = 'I am the 1st property variable';

    public static $count = 0;

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
    protected function getProperty()
    {
        return $this->property1;
    }
    public function __toString(){
        echo 'Testing the "magic" __toString method.' . "\n\r";
        return $this->getProperty();
    }
    public static function plusOne(){
        echo " The count is " . ++self::$count . ". \n\r";
    }
}

class ExtraLearning extends Learn {
    public function __construct(){
        echo "\n\r";
        parent::__construct();
        echo "\n\r";
        echo 'This is __construct() from  ' . __CLASS__;
        echo "\n\r";
    }
    public function extraMethod(){
        echo 'This is a method from '. __CLASS__ . '.';
        echo "\n\r";
    }
    public function getProtected(){
        return $this->getProperty();
    }
}
$learning = new Learn;
$learning2 = new Learn;
$learning3 = new ExtraLearning;
$learning3->extraMethod();
echo "\n\r";
// unset($learning);
// echo $learning->getProperty();
echo "\n\r";
 $learning3->setProperty('This is the new property');
echo "\n\r";
// echo $learning->getProperty();
// echo $learning2->getProperty();
echo "\n\r";
 $learning2->setProperty('This is the 2nd new property');
echo "\n\r";
// echo $learning2->getProperty();
echo "\n\r";
echo $learning;
echo "\n\r";
echo 'This should be coming from $learning3:  ';
echo $learning3->getProtected();
echo "\n\r";

do{
    echo
    Learn::plusOne();
}while(Learn::$count < 10);

?>