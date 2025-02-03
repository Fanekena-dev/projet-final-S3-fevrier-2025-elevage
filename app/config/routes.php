<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageControllers::class, 'landingPage']);