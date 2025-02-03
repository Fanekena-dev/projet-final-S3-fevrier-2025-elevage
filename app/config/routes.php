<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;
use app\controllers\w1\AdminSigninControllers;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageControllers::class, 'landingPage']);
// ===========
// # w1 routes
// ===========
$router->group(
  '/admin',
  function () use ($router) {
    $router->get('/sign-in', [AdminSigninControllers::class, 'signinPage']);
  }
);