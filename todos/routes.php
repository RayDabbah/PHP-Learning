<?php

    $router->getReq('about' , 'PageController@about');
    $router->getReq('contact' , 'PageController@contact');
    $router->getReq('' , 'PageController@home');
    $router->getReq('form' , 'PageController@form');
    $router->postReq('name' , 'PageController@name');
    $router->postReq('task' , 'PageController@task');
