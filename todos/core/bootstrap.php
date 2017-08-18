<?php
// $app = [];
// $app['config'] = require 'config.php';
// $app['database'] =;


App::bind('config', require 'config.php');
// die(var_dump(App::get('config')['db']));
App::bind('database', new Query(
    Connector::connect(App::get('config')['db'])
));

function views($view, $data=[]){
    extract($data);
    
    return require "views/$view.php";
}
