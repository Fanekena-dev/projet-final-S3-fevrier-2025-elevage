<?php
namespace app\models\w1;

use Flight;
use Exception;

class AdminModel
{
  private static $db;
  private static $table_name;
  public static function init(): void
  {
    self::$db = Flight::mysql();
    self::$table_name = 'breeding_admin';
  }

  public function signin($admin_id, $pwd)
  {
    try {
      $_table_name = self::$table_name;
      $query = "SELECT * FROM $_table_name 
              WHERE admin_id = :admin_id AND pwd = :pwd";
      $stmt = self::$db->prepare($query);
      $stmt->execute([
        ':admin_id' => $admin_id,
        ':pwd' => $pwd
      ]);
      // gestion d'admin avec meme id & pwd par accident ?
      $signin = !$stmt->fetch() === false;
      return [
        'success' => $signin,
        'message' => $signin ? null : 'Wrong id or wrong password'
      ];
    } catch (Exception $e) {
      return [
        'success' => false,
        'message' => $e->getMessage()
      ];
    }
  }
}

AdminModel::init();