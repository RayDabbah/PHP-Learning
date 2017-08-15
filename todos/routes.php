<?php

    $router->getReq('about' , 'controllers/about.php');
    $router->getReq('about/culture' , 'controllers/culture.php');
    $router->getReq('contact' , 'controllers/contact.php');
    $router->getReq('' , 'controllers/index.php');
    $router->getReq('form' , 'controllers/form.php');
    $router->postReq('name' , 'controllers/name.php');
