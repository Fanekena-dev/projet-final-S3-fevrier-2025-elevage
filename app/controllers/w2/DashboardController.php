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
        FLight::render('user/dashboard', $data);
        exit();
    }
}