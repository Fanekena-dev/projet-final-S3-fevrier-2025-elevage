<?php
namespace app\models\w1;

use Flight;

class AnimalModel
{
  private static $db;
  private static $animal_table;
  public static function init()
  {
    self::$db = Flight::mysql();
    self::$animal_table = 'breeding_animal';
  }
  public function __construct()
  {

  }

  public function addAnimal($animal_name, $animal_species, $description)
  {
    Req::insert(self::$db, self::$animal_table, [
      'animal_id' => Req::getNextPKValue(self::$db, self::$animal_table, 'animal_id', 'a'),
      'animal_name' => $animal_name,
      'animal_species' => $animal_species,
      'description' => $description
    ]);
    return ['success' => true, 'message' => 'Your animal was added succesfully'];
  }
}

AnimalModel::init();