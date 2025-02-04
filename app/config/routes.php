<?php

use app\controllers\w1\AdminController;
use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageController;
use app\controllers\w1\AdminSigninController;
use app\middlewares\w1\PrePostFormMiddleware;

use app\controllers\w2\DashboardController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageController::class, 'landingPage']);

// ===========
// # w1 routes
// ===========
$router->group(
  '/admin',
  function () use ($router) {
    $router->get('/sign-in', [AdminSigninController::class, 'signinPage']);
    $router->post('/sign-in/check', function () {
      (new AdminSigninController())->signin($_POST['admin-id'], $_POST['admin-pwd']); })
      ->addMiddleware([new PrePostFormMiddleware((new AdminSigninController())->get_required_fields())]);
    $router->get('/home', [AdminController::class, 'homePage']);
  }
);

$router->group('/user', function () use ($router) {
  $router->get('/sign-in', [DashboardController::class, 'renderDashboard']);
  $router->get('/dashboard', [DashboardController::class, 'renderDashboard']);
});

$router->group('/animals', function () use ($router) {
  $router->get('/', [DashboardController::class, 'getAnimalJson']);
  $router->get('/date', [DashboardController::class, 'getMyAnimals']);
  $router->get('/availableAnimals', [DashboardController::class, 'renderAvailableAnimals']);
});