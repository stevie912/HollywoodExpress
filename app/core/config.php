<?php

define('VERSION', '0.7.0');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('APPS', ROOT . DS . 'app');
define('CORE', ROOT . DS . 'core');
define('LIBS', ROOT . DS . 'lib');
define('MODELS', ROOT . DS . 'models');
define('VIEWS', ROOT . DS . 'views');
define('CONTROLLERS', ROOT . DS . 'controllers');
define('LOGS', ROOT . DS . 'logs');	
define('FILES', ROOT . DS. 'files');

// ---------------------  NEW DATABASE TABLE -------------------------
// define('DB_HOST', 'r2okq.h.filess.io');
// define('DB_USER', 'cosc4806_plentynone');
// define('DB_PASS', $_ENV['DB_PASS']);
// define('DB_DATABASE', 'cosc4806_plentynone');  
// define('DB_PORT', '3305');

define('DB_HOST', 'i65sr1.h.filess.io');
define('DB_USER', 'hollywood_yourhandam');
define('DB_PASS', $_ENV['DB_PASS2']);
define('DB_DATABASE', 'hollywood_yourhandam');  
define('DB_PORT', '61000');