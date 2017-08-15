<?php
$url = 'http://username:password@hostname:9090/path?arg=value#anchor';
echo "$url    \n   ";
echo "'1st:  '\n";
var_dump(parse_url($url));
echo 'PHP_URL_SCHEME:  ';
var_dump(parse_url($url, PHP_URL_SCHEME));
echo 'PHP_URL_USER:  ';
var_dump(parse_url($url, PHP_URL_USER));
echo 'PHP_URL_PASS:  ';
var_dump(parse_url($url, PHP_URL_PASS));
echo 'PHP_URL_HOST:  ';
var_dump(parse_url($url, PHP_URL_HOST));
echo 'PHP_URL_PORT:  ';
var_dump(parse_url($url, PHP_URL_PORT));
echo 'PHP_URL_PATH:  ';
var_dump(parse_url($url, PHP_URL_PATH));
echo 'PHP_URL_QUERY:  ';
var_dump(parse_url($url, PHP_URL_QUERY));
echo 'PHP_URL_FRAGMENT:  ';
var_dump(parse_url($url, PHP_URL_FRAGMENT));
?>