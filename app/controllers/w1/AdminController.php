<?php
namespace app\controllers\w1;

use Flight;

class AdminController
{
  public function __construct()
  {
  }
  public function species()
  {
    Flight::render('admin/adminSpecies');
    exit();
  }
}