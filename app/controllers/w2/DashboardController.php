<?php
namespace app\controllers\w2;

use FLight;

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

    public function availableAnimals()
    {
        $db = Flight::db();
        $availableAnimalsModel = new AvalaibleAnimalsModel($db);
        $availableAnimals = $availableAnimalsModel->getAvailableAnimals();
        $data = ['title' => 'Available Animals', 'availableAnimals' => $availableAnimals];
        Flight::render('user/available_animals', $data);
    }
}