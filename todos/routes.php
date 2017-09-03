<?php
$router->getReq('about', 'PageController@about');
$router->getReq('contact', 'PageController@contact');
$router->getReq('', 'PageController@home');
$router->getReq('form', 'PageController@form');
$router->getReq('names', 'PageController@names');
$router->postReq('signup', 'PageController@signup');
$router->postReq('task', 'PageController@task');
$router->postReq('delete', 'PageController@delete');
$router->postReq('update', 'PageController@update');
$router->postReq('login', 'PageController@login');
$router->getReq('logOut', 'PageController@logOut');
$router->getReq('ajax', 'PageController@ajax');
