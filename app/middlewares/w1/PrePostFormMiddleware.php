<?php
namespace app\middlewares\w1;

use Flight;

class PrePostFormMiddleware
{
  private array $required_fields;
  public function __construct(array $required_fields = [''])
  {
    $this->required_fields = $required_fields;
  }
  public function before($params)
  {
    $missing_fields = array_diff($this->required_fields, array_keys($_POST));
    if (!empty($missing_fields)) {
      $error_msg = 'There are missing fields in the form: ' . implode(', ', $missing_fields);
      echo json_encode(['success' => false, 'message' => $error_msg]);
      exit();
    }
  }
}