<?php
namespace app\controllers\w1;

use app\models\w1\AnimalModel;
use Flight;

class AnimalController
{
  public function __construct()
  {
  }
  public function addAnimal($animal_name, $animal_species, $description)
  {
    echo json_encode((new AnimalModel())->addAnimal($animal_name, $animal_species, $description));
    exit();
  }
}