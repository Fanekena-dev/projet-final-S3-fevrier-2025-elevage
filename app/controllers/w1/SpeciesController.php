<?php
namespace app\controllers\w1;

use app\models\w1\SpeciesModel;
use Flight;

class SpeciesController
{
  public function __construct()
  {
  }
  public function getSpeciesUpdatableInfo()
  {
    echo json_encode(SpeciesModel::getSpeciesUpdatableInfo());
    exit();
  }

  public function bigUpdate($updates)
  {
    echo json_encode(SpeciesModel::bigUpdate($updates));
    exit();
  }
}