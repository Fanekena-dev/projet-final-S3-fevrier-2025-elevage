<?php
namespace app\controllers\w2;

use FLight;
use app\models\w3\MyAnimalsModel;

class DashboardController
{
    public function __construct()
    {
    }

    public function renderDashboard()
    {
        $data = ['title' => 'Dashboard', 'page' => 'dashboard'];
        FLight::render('user/template', $data);
        exit();
    }

    public function getMyAnimals()
    {
        $model = new MyAnimalsModel(Flight::mysql(), 'user1');
        $availableAnimals = $model->getMyAnimalsForADate($_GET['date']);
        $data = ['title' => 'Available Animals', 'availableAnimals' => $availableAnimals];
        Flight::json($availableAnimals);
    }

    public function getAnimalJson($idAnimal)
    {
        $model = new MyAnimalsModel(Flight::mysql(), 'user1');
        $animal = $model->getAnimal($idAnimal);
        return json_encode($animal);
    }
}