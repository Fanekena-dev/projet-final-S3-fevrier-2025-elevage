<?php
namespace app\controllers\w2;

use FLight;
use app\models\w3\AvalaibleAnimalsModel;
use app\models\w3\MyAnimalsModel;

class DashboardController
{
    public function __construct()
    {
    }

    public function renderDashboard()
    {
        $data = ['title' => 'dashboard', 'page' => 'dashboard'];
        FLight::render('user/template', $data);
        exit();
    }

    public function renderAvailableAnimals()
    {
        $model = new AvalaibleAnimalsModel(Flight::mysql());
        $availableAnimals = $model->getAvailableAnimals();
        $data = ['title' => 'Available Animals', 'page' => 'available_animals', 'availableAnimals' => $availableAnimals];
        FLight::render('user/template', $data);
    }

    public function getMyAnimals()
    {
        $model=new MyAnimalsModel(Flight::mysql(), 'user1');   
        $availableAnimals = $model->getMyAnimalsForADate($_GET['date']);
        $data = ['title' => 'Available Animals', 'availableAnimals' => $availableAnimals];
        Flight::json($availableAnimals);
    }
}