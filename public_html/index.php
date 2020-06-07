<?php

/**
 * Front controller
 *
 * PHP version 7.3
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Sessions
 */
session_start();


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Tasks', 'action' => 'show']);
$router->add('login', ['controller' => 'Login', 'action' => 'new']);
$router->add('logout', ['controller' => 'Login', 'action' => 'destroy']);

$router->add('{controller}/{action}');
$router->add('{controller}/{action}/{id:\d+}');

$router->add('{controller}/{action}/{orderby:([a-z])\w+}');
$router->add('{controller}/{action}/{pageno:\d+}/{limit:\d+}');
$router->add('{controller}/{action}/{orderby:([a-z])\w+}/{pageno:\d+}/{limit:\d+}');
$router->add('{controller}/{action}/{orderby:([a-z])\w+}/{ascdesc:\b(asc|desc)\b}/{pageno:\d+}/{limit:\d+}');

$router->dispatch($_SERVER['QUERY_STRING']);