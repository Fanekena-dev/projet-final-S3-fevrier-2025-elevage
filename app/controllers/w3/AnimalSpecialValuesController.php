<?php 
namespace app\controllers\w3;

use app\models\w2\userModel;
use Flight;
use app\models\w3\AvalaibleAnimalsModel;
use app\models\w3\GenericDAOModel;

class AnimalSpecialValuesController
{
    public function __construct()
    {

    }

    public function updateDWE($idAnimal,$insert_date,$dwe)
    {
        $data=['animal_id'=>$idAnimal,'insert_date'=>$insert_date,'day_without_eating'=>$dwe];
        $model=new GenericDAOModel(Flight::mysql(),"day_without_eating","breeding_animal_day_without_eating","day_without_eating_id");
        $model->insert($data);
        Flight::redirect('/animals/form');
    }
    public function updateWeightLossWithoutFood($idAnimal,$insert_date,$wlp)
    {
        $data=['animal_id'=>$idAnimal,'insert_date'=>$insert_date,'weight_loss_percent'=>$wlp];
        $model=new GenericDAOModel(Flight::mysql(),"weight_loss","breeding_animal_weight_loss","weight_loss_id");
        $model->insert($data);
        Flight::redirect('/animals/form');
    }
}