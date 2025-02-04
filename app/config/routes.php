<?php
use app\controllers\w1\AnimalController;
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
use app\controllers\w3\AnimalSpecialValuesController;


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
  '/admin/species',
  function () use ($router) {
    $router->get('/', [AdminController::class, 'species']);
    $router->get('/updatable-info', [SpeciesController::class, 'getSpeciesUpdatableInfo']);
    $router->post('/update', function () {
      (new SpeciesController())->bigUpdate($_POST['species']);
    })
      ->addMiddleware([new PrePostFormMiddleware(['species'])]);
    $router->get('/index', [SpeciesController::class, 'index']);
  }
);

$router->group(
  '/admin/animals',
  function () use ($router) {
    $router->get('/', [AdminController::class, 'animals']);
    $router->post('/add', function () {
      (new AnimalController())->addAnimal($_POST['animal-name'], $_POST['animal-species'], $_POST['animal-description']);
    })
      ->addMiddleware([new PrePostFormMiddleware(['animal-name', 'animal-species', 'animal-description'])]);
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
  $router->get('/form', [DashboardController::class, 'renderForm']);
  $router->get('/marketplace', [MarketInteractionController::class, 'renderMarketplace']);


  $router->get('/', [DashboardController::class, 'getAnimalJson']);
  $router->get('/date', [DashboardController::class, 'getMyAnimalsJSON']);
  $router->get('/availableAnimals', [DashboardController::class, 'renderAvailableAnimals']);

  $router->post('/sendToMarket', [MarketInteractionController::class, 'insert']);
  $router->post('/getFromMarket', [MarketInteractionController::class, 'getFromMarket']);

  
  $router->group('/update', function () use ($router) {
    $router->post('/day-before-dying', function () {
      $animalSpecialValuesController = new AnimalSpecialValuesController();
      $animalSpecialValuesController->updateDWE($_POST['animal_id'], date('Y-m-d H:i:s'), $_POST['value']);
    });
    $router->post('/weight-loss', function () {
      $animalSpecialValuesController = new AnimalSpecialValuesController();
      $animalSpecialValuesController->updateWeightLossWithoutFood($_POST['animal_id'], date('Y-m-d H:i:s'), $_POST['value']);
    });
  });
});

$router->get('/reset', [DashboardController::class, 'reset']);