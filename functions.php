<?php

function ageCheck($age){
    if($age >= 21){
        echo 'You are aloud in';
    }else{
        echo 'You are too young to join!';
    }
}