<?php
namespace app\controllers\w2;

use FLight;
use app\models\w3\AvalaibleAnimalsModel;

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
        $model=new AvalaibleAnimalsModel(Flight::mysql());   
        $availableAnimals = $model->getAvailableAnimals();
        $data = ['title' => 'Available Animals', 'availableAnimals' => $availableAnimals];
        Flight::render('user/available_animals', $data);
    }
}