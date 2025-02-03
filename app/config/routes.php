<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;
use app\controllers\w1\AdminSigninControllers;
use app\controllers\w2\DashboardController;

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

$router->group('/user', function () use ($router) {
    $router->get('/sign-in', [DashboardController::class, 'renderDashboard']);
    $router->get('/dashboard', [DashboardController::class, 'renderDashboard']);
    $router->get('/availableAnimals', [DashboardController::class, 'renderAvailableAnimals']);
});