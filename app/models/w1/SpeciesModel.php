<?php
namespace app\models\w1;

use Flight;
use Exception;
use PDO;
class SpeciesModel
{
  private $species_id;
  private static $db;
  private static $species_table;
  private static $species_min_weight_sale_table;
  private static $species_max_weight_table;
  private static $species_selling_price_table;
  private static $species_day_without_eating_table;
  private static $species_weight_loss_table;
  public static function init()
  {
    self::$db = Flight::mysql();
    self::$species_table = 'breeding_animal_species';
    self::$species_min_weight_sale_table = 'breeding_species_min_weight_sale';
    self::$species_max_weight_table = 'breeding_species_max_weight';
    self::$species_selling_price_table = 'breeding_species_selling_price';
    self::$species_day_without_eating_table = 'breeding_species_day_without_eating';
    self::$species_weight_loss_table = 'breeding_species_weight_loss';
  }

  public function __construct($species_id)
  {
    $this->species_id = $species_id;
  }

  private function getProcedure_01($table, $column){
    $query = "SELECT * FROM $table WHERE species_id = :species_id ORDER BY insert_date DESC LIMIT 1";
    $stmt = self::$db->prepare($query);
    $stmt->execute([':species_id' => $this->species_id]);
    return $stmt->fetch()[$column] ?? null;
  }

  public function getSpeciesMinWeightSale()
  {
    return $this->getProcedure_01(self::$species_min_weight_sale_table, 'min_sales_weight');
  }

  public function updateSpeciesMinWeightSale($min_weight_sale)
  {
    $_table = self::$species_min_weight_sale_table;
    Req::insert(self::$db, $_table, [
      'min_sale_weight_id' => Req::getNextPKValue(self::$db, $_table, 'min_sale_weight_id', 'smws'),
      'species_id' => $this->species_id,
      'min_sales_weight' => $min_weight_sale
    ]);
  }

  public function getSpeciesMaxWeight()
  {
    return $this->getProcedure_01(self::$species_max_weight_table, 'max_weight');
  }

  public function updateSpeciesMaxWeight($max_weight)
  {
    $_table = self::$species_max_weight_table;
    Req::insert(self::$db, $_table, [
      'max_weight_id' => Req::getNextPKValue(self::$db, $_table, 'max_weight_id', 'smw'),
      'species_id' => $this->species_id,
      'max_weight' => $max_weight
    ]);
  }

  public function getSpeciesSellingPrice()
  {
    return $this->getProcedure_01(self::$species_selling_price_table, 'selling_price'); // money/kg
  }

  public function updateSpeciesSellingPrice($selling_price)
  {
    $_table = self::$species_selling_price_table;
    Req::insert(self::$db, $_table, [
      'selling_price_id' => Req::getNextPKValue(self::$db, $_table, 'selling_price_id', 'sp'),
      'species_id' => $this->species_id,
      'selling_price' => $selling_price
    ]);
  }

  public function getSpeciesDayWithoutEating()
  {
    return $this->getProcedure_01(self::$species_day_without_eating_table, 'day_without_eating'); // money/kg
  }

  public function updateSpeciesDayWithoutEating($day_without_eating)
  {
    $_table = self::$species_day_without_eating_table;
    Req::insert(self::$db, $_table, [
      'day_without_eating_id' => Req::getNextPKValue(self::$db, $_table, 'day_without_eating_id', 'dwe'),
      'species_id' => $this->species_id,
      'day_without_eating' => $day_without_eating
    ]);
  }

  public function getSpeciesWeightLoss()
  {
    return $this->getProcedure_01(self::$species_weight_loss_table, 'weight_loss_percent'); // money/kg
  }

  public function updateSpeciesWeightLoss($weight_loss_percent)
  {
    $_table = self::$species_weight_loss_table;
    Req::insert(self::$db, $_table, [
      'weight_loss_id' => Req::getNextPKValue(self::$db, $_table, 'weight_loss_id', 'wl'),
      'species_id' => $this->species_id,
      'weight_loss_percent' => $weight_loss_percent
    ]);
  }

  public function getSpeciesInfo()
  {
    $_table = self::$species_table;
    $query = "SELECT * FROM $_table WHERE species_id = :species_id";
    $stmt = self::$db->prepare($query);
    $stmt->execute([':species_id' => $this->species_id]);
    return $stmt->fetch() ?? null;
  }

  public static function getAllSpecies()
  {
    $_table = self::$species_table;
    $query = "SELECT * FROM $_table";
    $stmt = self::$db->prepare($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? null;
  }

  public static function getSpeciesUpdatableInfo()
  {
    $species = self::getAllSpecies();
    if ($species === null)
      return null;
    $updatable = [];
    for ($i = 0; $i < count($species); $i++) {
      $specie = new SpeciesModel($species[$i]['species_id']);
      $updatable[$i]['species_id'] = $species[$i]['species_id'];
      $updatable[$i]['species_name'] = $species[$i]['species_name'];
      $updatable[$i]['min_weight_sale'] = $specie->getSpeciesMinWeightSale();
      $updatable[$i]['max_weight'] = $specie->getSpeciesMaxWeight();
      $updatable[$i]['selling_price'] = $specie->getSpeciesSellingPrice();
      $updatable[$i]['day_without_eating'] = $specie->getSpeciesDayWithoutEating();
      $updatable[$i]['weight_loss'] = $specie->getSpeciesWeightLoss();
    }
    return $updatable;
  }

  public static function bigUpdate($updates)
  {
    self::$db->beginTransaction();
    foreach ($updates as $update) {
      $specie = new SpeciesModel($update['species_id']);
      $specie->updateSpeciesMinWeightSale($update['min_weight_sale']);
      $specie->updateSpeciesMaxWeight($update['max_weight']);
      $specie->updateSpeciesSellingPrice($update['selling_price']);
      $specie->updateSpeciesDayWithoutEating($update['day_without_eating']);
      $specie->updateSpeciesWeightLoss($update['weight_loss']);
    }
    self::$db->commit();
    return ['success' => true, 'message' => 'Species updated successfully'];
  }
}

SpeciesModel::init();