<?php

define('INSTALL_FOLDER', '/try/php/garden/');
define('DIR', __DIR__);
define('URL', 'http://localhost/try/php/garden/');
define('DOOR_BELL', true);
$uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']); //<---replacing working tag root with ''
$uri = explode('/' , $uri); //<---splitting a string
_d($uri);

include __DIR__.'/bootstrap.php';

//ROUTER 
if('planting' == $uri[0]){
    include DIR.'/planting.php';
}elseif('growing' === $uri[0]){
    include DIR.'/growingg.php';
} elseif('removing' === $uri[0]){
    include DIR.'/growingg.php';
} 