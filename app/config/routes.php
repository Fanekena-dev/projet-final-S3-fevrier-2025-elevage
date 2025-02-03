<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;
use app\controllers\w2\DashboardController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageControllers::class, 'landingPage']);

$router->group('/user', function () use ($router) {
    $router->get('/sign-in', [DashboardController::class, 'renderDashboard']);
    $router->get('/dashboard', [DashboardController::class, 'renderDashboard']);
    $router->get('/availableAnimals', [DashboardController::class, 'availableAnimals']);
});