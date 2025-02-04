<?php
namespace app\models\w3;

use Flight;
use PDO;

class GenericDAOModel {

    private $db;
    private $prefix;
    private $table_name;
    private $primary_column_name;
    public function __construct($db,$prefix,$table_name,$primary_column_name)
    {
        $this->db=$db;
        $this->prefix=$prefix;
        $this->table_name=$table_name;
        $this->primary_column_name=$primary_column_name;
    }

    public function get_next_ID_value()
    {
      if ($this->db == Flight::mysql()) {
        $count_query = "SELECT COUNT(*) AS line_count FROM {$this->table_name}";

        $count_stmt = $this->db->prepare($count_query);
        $count_stmt->execute();

        $result = $count_stmt->fetch(PDO::FETCH_ASSOC);

        $count = $result['line_count'];

        if ($count == 0) {
          return "$this->prefix" . '1';
        } else {
          $max_number_query = "SELECT MAX(CAST(SUBSTRING({$this->primary_column_name}, CHAR_LENGTH('{$this->prefix}') + 1) AS UNSIGNED)) AS max_number
                  FROM {$this->table_name} WHERE {$this->primary_column_name} LIKE '{$this->prefix}%'";

          $max_number_stmt = $this->db->prepare($max_number_query);
          $max_number_stmt->execute();

          $result = $max_number_stmt->fetch(PDO::FETCH_ASSOC);

          $max_number = $result['max_number'];
          $max_number++;

          return $this->prefix."".$max_number;
        }
      }
      return null;
    }
    public function insert($data)
    {
        $data[$this->primary_column_name]=$this->get_next_ID_value();
        $columns=implode(',',array_keys($data));
        $placeholders=":".implode(', :',array_keys($data));
        $query="INSERT INTO {$this->table_name} ($columns) VALUES ($placeholders)";
        $result=$this->db->prepare($query);
        $result->execute($data);
    }
    public function update($data,$conditions)
    {
        $columns=array_keys($data);
        $placeholders="";
        for($i=0;$i<count($columns);$i++)
        {
          if($i!=0)
          {
            $placeholders=$placeholders.",";
          }
          $placeholders=$placeholders." $columns[$i] = :$columns[$i]";
        }
        $query="UPDATE {$this->table_name} SET $placeholders WHERE $conditions";
        $result=$this->db->prepare($query);
        $result->execute($data);
    }
}
