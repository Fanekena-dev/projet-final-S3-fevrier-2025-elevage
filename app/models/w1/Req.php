<?php
namespace app\models\w1;

use Flight;
use PDO;

class Req
{
  public static function getNextPKValue($db, $table_name, $column_name, $prefix)
  {
    if ($db == Flight::mysql()) {
      $count_query = "SELECT COUNT(*) AS line_count FROM $table_name";

      $count_stmt = $db->prepare($count_query);
      $count_stmt->execute();

      $result = $count_stmt->fetch(PDO::FETCH_ASSOC);

      $count = $result['line_count'];

      if ($count == 0) {
        return "$prefix" . '1';
      } else {
        $max_number_query = "SELECT MAX(CAST(SUBSTRING($column_name, CHAR_LENGTH('$prefix') + 1) AS UNSIGNED)) AS max_number
                FROM $table_name WHERE $column_name LIKE '$prefix%'";

        $max_number_stmt = $db->prepare($max_number_query);
        $max_number_stmt->execute();

        $result = $max_number_stmt->fetch(PDO::FETCH_ASSOC);

        $max_number = $result['max_number'];
        $max_number++;

        return "$prefix$max_number";
      }
    }
    return null;
  }

  public static function insert($db, $table_name, $data)
  {
    if ($db == Flight::mysql()) {
      $columns = implode(',', array_keys($data));

      $placeholders = ":" . implode(', :', array_keys($data));

      $query = "INSERT INTO $table_name($columns) VALUES ($placeholders)";

      $result = $db->prepare($query);
      $result->execute($data);

      return true;
    }
    return false;
  }
}