<?php
namespace app\controllers\w2;

use app\models\w2\UserModel;
use FLight;
use app\models\w3\MyAnimalsModel;

class DashboardController
{
    public function __construct()
    {
    }

    public function renderDashboard()
    {
        $usermodel = new UserModel(FLight::mysql());
        $data = ['title' => 'Dashboard', 'page' => 'dashboard', 'balance' => $usermodel->getUserBalance(userId: $_SESSION['user']['user_id']), 'user_id' => $_SESSION['user']['user_id']];
        FLight::render('user/template', $data);
        exit();
    }

    public function renderForm()
    {
        $usermodel = new UserModel(FLight::mysql());
        $data = ['title' => 'Forms', 'page' => 'form', 'animals' => $this->getMyAnimals(date('Y-m-d H:i:s'))];
        FLight::render('user/template', $data);
        exit();
    }

    public function getMyAnimalsJSON()
    {
        $availableAnimals = $this->getMyAnimals($_GET['']);
        Flight::json($availableAnimals);
    }

    public function getMyAnimals($date)
    {
        $model = new MyAnimalsModel(Flight::mysql(), $_SESSION['user']['user_id']);
        $availableAnimals = $model->getMyAnimalsForADate($date);
        return $availableAnimals;
    }

    public function getAnimalJson($idAnimal)
    {
        $model = new MyAnimalsModel(Flight::mysql(), $_SESSION['user']['user_id']);
        $animal = $model->getAnimal($idAnimal);
        return json_encode($animal);
    }

    public function reset($idUser)
    {
        $db=Flight::mysql();
        $tables=
        [
        'breeding_animal_market_mvt',
        'breeding_user_animal_mvt',
        'breeding_user_wallet'
        ];
        foreach($tables as $table)
        {
            $stat=$sql="DELETE FROM $table WHERE user_id=:idUser";
            $stat=$db->prepare($sql);
            $stat->execute(['idUser'=>$idUser]);
        }
    }
}