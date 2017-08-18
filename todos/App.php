<?php

class App
{
    protected static $list = [];

    static function bind($key, $value){
        static::$list[$key] = $value;
    }
    static function get($key){
        if(!array_key_exists($key, static::$list)){
            throw new Exception("No ${key} in this container");
        }
        return static::$list[$key];
    }
}
