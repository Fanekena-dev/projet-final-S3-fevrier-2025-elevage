<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;
use app\controllers\w2\DashboardControllers;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageControllers::class, 'landingPage']);

$router->group('/user', function () use ($router) {
    $router->get('/dashboard', [DashboardControllers::class, 'renderDashboard']);
});