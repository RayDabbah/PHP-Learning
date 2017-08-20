<?php

    $router->getReq('about' , 'PageController@about');
    $router->getReq('contact' , 'PageController@contact');
    $router->getReq('' , 'PageController@home');
    $router->getReq('form' , 'PageController@form');
    $router->getReq('names' , 'PageController@names');
    $router->postReq('name' , 'PageController@name');
    $router->postReq('task' , 'PageController@task');
    $router->postReq('delete' , 'PageController@delete');
