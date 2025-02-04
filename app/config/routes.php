<?php
use flight\Engine;
use flight\net\Router;

use app\controllers\w1\AdminController;
use app\controllers\w1\SpeciesController;
use app\controllers\w1\LandingPageController;
use app\controllers\w1\AdminSigninController;
use app\middlewares\w1\PrePostFormMiddleware;

use app\controllers\w2\DashboardController;
use app\controllers\w2\AuthController;

use app\controllers\w3\MarketInteractionController;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', [LandingPageController::class, 'landingPage']);

// ===========
// # w1 routes
// ===========
$router->group(
  '/admin/sign-in',
  function () use ($router) {
    $router->get('/', [AdminSigninController::class, 'signinPage']);
    $router->post('/check', function () {
      (new AdminSigninController())->signin($_POST['admin-id'], $_POST['admin-pwd']);
    })
      ->addMiddleware([new PrePostFormMiddleware((new AdminSigninController())->get_required_fields())]);
  }
);

$router->group(
  '/admin',
  function () use ($router) {
    $router->get('/species', [AdminController::class, 'species']);
    $router->get('/species/updatable-info', [SpeciesController::class, 'getSpeciesUpdatableInfo']);
    $router->post('/species/update', function () {
      (new SpeciesController())->bigUpdate($_POST['species']);
    })
      ->addMiddleware([new PrePostFormMiddleware(['species'])]);
  }
);

//////////////////////////////
/// W2 routes
//////////////////////////////
$router->group('/auth', function () use ($router) {
  $router->get('/', [AuthController::class, 'renderUserSignIn']);

  $router->get('/sign-in', [AuthController::class, 'renderUserSignIn']);
  $router->get('/sign-up', [AuthController::class, 'renderUserSignUp']);

  $router->post('/sign-in/check', [AuthController::class, 'signIn']);
  $router->post('/sign-up/check', [AuthController::class, 'signUp']);
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