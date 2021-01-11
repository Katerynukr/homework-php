<?php

define('INSTALL_FOLDER', '/try/php/garden/');
define('DIR', __DIR__);
define('URL', 'http://localhost/try/php/garden/');
define('DOOR_BELL', true);

include __DIR__.'/bootstrap.php';


_d(Garden\APP::route());