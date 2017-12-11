<?php
// require 'classMessaging/business.php';
// require 'classMessaging/staff.php';
// require 'classMessaging/person.php';

require 'vendor/autoload.php';


use App\Business;
use App\Staff;
use App\Person;

$rdabbah = new Person('R Dabbah');
$staff = new Staff;
$allways = new Business($staff);
$allways->hire($rdabbah);
var_dump($rdabbah);
var_dump($staff);
var_dump($allways);
