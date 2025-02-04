<?php

use flight\Engine;
use flight\net\Router;

use app\controllers\w1\LandingPageControllers;
use app\controllers\w1\AdminSigninControllers;
use app\middlewares\w1\PrePostFormMiddleware;

use app\controllers\w2\DashboardController;
use app\controllers\w2\AuthController;

use app\controllers\w3\MarketInteractionController;

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
    $router->post('/sign-in/check', [AdminSigninControllers::class, 'signin'])
      ->addMiddleware([new PrePostFormMiddleware((new AdminSigninControllers())->get_required_fields())]);
  }
);

//////////////////////////////
/// W2 routes
//////////////////////////////
$router->group('/auth', function () use ($router) {
  $router->get('/', [AuthController::class, 'renderUserSignIn']);

  $router->get('/sign-in', [AuthController::class, 'renderUserSignIn']);
  $router->get('/sign-up', [AuthController::class, 'renderUserSignUp']);

  $router->get('/sign-in/check', [AuthController::class, 'signIn']);
  $router->get('/sign-up/check', [AuthController::class, 'signUp']);
});

$router->group('/user', function () use ($router) {
  $router->get('/sign-in', [DashboardController::class, 'renderDashboard']);
  $router->get('/dashboard', [DashboardController::class, 'renderDashboard']);
});

$router->group('/animals', function () use ($router) {
  $router->get('/dashboard', [DashboardController::class, 'renderDashboard']);
  $router->get('/marketplace', [MarketInteractionController::class, 'renderMarketplace']);

  $router->get('/', [DashboardController::class, 'getAnimalJson']);
  $router->get('/date', [DashboardController::class, 'getMyAnimals']);
  $router->get('/availableAnimals', [DashboardController::class, 'renderAvailableAnimals']);
  $router->post('/sendToMarket', [MarketInteractionController::class, 'insert']);
});